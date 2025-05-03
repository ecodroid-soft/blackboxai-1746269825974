// Mobile Menu Toggle
    function toggleMobileMenu() {
        const menu = document.getElementById('mobileMenu');
        menu.classList.toggle('hidden');
    }

    // Fetch states and populate stateSelect
    async function fetchStates() {
        try {
            const response = await fetch('/includes/location-api.php?type=states');
            const data = await response.json();
            if (data.success) {
                const stateSelect = document.getElementById('stateSelect');
                stateSelect.innerHTML = '<option value="">Select State</option>';
                data.data.forEach(state => {
                    const option = document.createElement('option');
                    option.value = state.id;
                    option.textContent = state.name;
                    option.dataset.slug = state.slug;
                    stateSelect.appendChild(option);
                });
            }
        } catch (error) {
            console.error('Error fetching states:', error);
        }
    }

    // Fetch districts based on selected state
    async function fetchDistricts(stateId) {
        try {
            const response = await fetch(`/includes/location-api.php?type=districts&state=${stateId}`);
            const data = await response.json();
            if (data.success) {
                const districtSelect = document.getElementById('districtSelect');
                districtSelect.innerHTML = '<option value="">Select District</option>';
                data.data.districts.forEach(district => {
                    const option = document.createElement('option');
                    option.value = district.id;
                    option.textContent = district.name;
                    option.dataset.slug = district.slug;
                    districtSelect.appendChild(option);
                });
                districtSelect.disabled = false;
            }
        } catch (error) {
            console.error('Error fetching districts:', error);
        }
    }

    // Event listeners for selects
    document.getElementById('stateSelect').addEventListener('change', async function() {
        const stateId = this.value;
        if (stateId) {
            await fetchDistricts(stateId);
        } else {
            const districtSelect = document.getElementById('districtSelect');
            districtSelect.innerHTML = '<option value="">Select District</option>';
            districtSelect.disabled = true;
        }
    });
// Initialize states on page load
fetchStates();

// Geolocation and reverse geocoding to preselect location dropdowns using Google Maps API
function preselectLocationByGeolocation() {
    if (!navigator.geolocation) {
        console.log('Geolocation is not supported by this browser.');
        return;
    }

    navigator.geolocation.getCurrentPosition(async (position) => {
        const lat = position.coords.latitude;
        const lon = position.coords.longitude;
        console.log('User location:', lat, lon);

        try {
            // Use Google Maps Geocoding API for reverse geocoding
            const apiKey = 'AIzaSyBvSyfJJszYSpVRKrwohT9wXKIWNN1Ena4';
            const response = await fetch(`https://maps.googleapis.com/maps/api/geocode/json?latlng=${lat},${lon}&key=${apiKey}`);
            const data = await response.json();
            console.log('Google Maps reverse geocoding data:', data);

            if (data.status === 'OK' && data.results.length > 0) {
                let stateName = '';
                let districtName = '';

                // Parse address components
                const components = data.results[0].address_components;
                components.forEach(component => {
                    if (component.types.includes('administrative_area_level_1')) {
                        stateName = component.long_name;
                    }
                    if (component.types.includes('administrative_area_level_2')) {
                        districtName = component.long_name;
                    }
                });

                console.log('Detected state:', stateName);
                console.log('Detected district:', districtName);

                // Find and select state option
                const stateSelect = document.getElementById('stateSelect');
                let matchedStateOption = null;
                for (const option of stateSelect.options) {
                    if (option.text.toLowerCase() === stateName.toLowerCase()) {
                        matchedStateOption = option;
                        break;
                    }
                }
                if (matchedStateOption) {
                    stateSelect.value = matchedStateOption.value;
                    stateSelect.dispatchEvent(new Event('change'));

                    // Wait for districts to load then select district
                    const districtSelect = document.getElementById('districtSelect');
                    const waitForDistricts = setInterval(() => {
                        if (!districtSelect.disabled && districtSelect.options.length > 1) {
                            clearInterval(waitForDistricts);
                            let matchedDistrictOption = null;
                            for (const option of districtSelect.options) {
                                if (option.text.toLowerCase() === districtName.toLowerCase()) {
                                    matchedDistrictOption = option;
                                    break;
                                }
                            }
                            if (matchedDistrictOption) {
                                districtSelect.value = matchedDistrictOption.value;
                                districtSelect.dispatchEvent(new Event('change'));
                            }
                        }
                    }, 500);
                }
            }
        } catch (error) {
            console.error('Error during Google Maps reverse geocoding:', error);
        }
    }, (error) => {
        console.warn('Geolocation error:', error.message);
    });
}

// Call the function after states are fetched
fetchStates().then(() => {
    preselectLocationByGeolocation();
});
