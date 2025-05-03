$(document).ready(function() {
    var $serviceSelect = $('#serviceSelect');
    var $stateSelect = $('#stateSelect');
    var $districtSelect = $('#districtSelect');

    $serviceSelect.change(function() {
        var service = $(this).val();
        var stateSlug = $stateSelect.find('option:selected').data('slug');
        var districtSlug = $districtSelect.find('option:selected').data('slug');

        if (service && stateSlug && districtSlug) {
            window.location.href = '/locations/' + stateSlug + '/' + districtSlug + '/' + service + '.php';
        } else if (service) {
            window.location.href = '/services/' + service + '.php';
        }
    });

    $stateSelect.change(function() {
        var stateId = $(this).val();
        if (stateId) {
            fetchDistricts(stateId);
        } else {
            $districtSelect.html('<option value="">Select District</option>');
            $districtSelect.prop('disabled', true);
        }
    });

    $districtSelect.change(function() {
        var service = $serviceSelect.val();
        var stateSlug = $stateSelect.find('option:selected').data('slug');
        var districtSlug = $(this).find('option:selected').data('slug');

        if (service && stateSlug && districtSlug) {
            window.location.href = '/locations/' + stateSlug + '/' + districtSlug + '/' + service + '.php';
        }
    });

    async function fetchStates() {
        try {
            const response = await fetch('/includes/location-api.php?type=states');
            const data = await response.json();
            if (data.success) {
                $stateSelect.html('<option value="">Select State</option>');
                data.data.forEach(state => {
                    const option = $('<option></option>').val(state.id).text(state.name).attr('data-slug', state.slug);
                    $stateSelect.append(option);
                });
            }
        } catch (error) {
            console.error('Error fetching states:', error);
        }
    }

    async function fetchDistricts(stateId) {
        try {
            const response = await fetch(`/includes/location-api.php?type=districts&state=${stateId}`);
            const data = await response.json();
            if (data.success) {
                $districtSelect.html('<option value="">Select District</option>');
                data.data.districts.forEach(district => {
                    const option = $('<option></option>').val(district.id).text(district.name).attr('data-slug', district.slug);
                    $districtSelect.append(option);
                });
                $districtSelect.prop('disabled', false);
            }
        } catch (error) {
            console.error('Error fetching districts:', error);
            $districtSelect.prop('disabled', true);
        }
    }

    fetchStates();
});
