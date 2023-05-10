<div class="card-body">
    <h4 class="card-title">Delivery Information</h4>
    <form method="POST" action="{{ route('address.store') }}" class="text-left" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="checkout-first-name">Full name</label>
                <input type="text" class="form-control" id="checkout-first-name" name="name"
                    placeholder="Enter your first and last name" value="{{ old('name') }}">
                @error('name')
                    <span class="help-inline">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="checkout-region">Region</label>
                <select type="text" class="form-control" id="checkout-region" name="region">
                    <option value="" disabled selected>Please choose your region</option>
                    @foreach ($regions as $region)
                        <option value="{{ $region->id }}" {{ old('region') == "$region->id" ? 'selected' : '' }}>
                            {{ $region->name }}</option>
                    @endforeach
                </select>
                @error('region')
                    <span class="help-inline">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="checkout-phone">Phone number</label>
                <input type="text" class="form-control" id="checkout-phone"
                    placeholder="Please enter your phone number" name="phoneNumber" value="{{ old('phoneNumber') }}">
                @error('phoneNumber')
                    <span class="h  elp-inline">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="checkout-city">City</label>
                <select type="text" class="form-control" id="checkout-city" name="city">
                    <option value="" disabled selected>Please choose your city</option>
                </select>
                @error('region')
                    <span class="help-inline">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="checkout-house">Building / House No / Floor / Street</label>
                <input type="text" class="form-control" id="checkout-house" placeholder="Please Enter"
                    name="building" value="{{ old('building') }}">
                @error('building')
                    <span class="help-inline">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="checkout-township">Township</label>
                <select type="text" class="form-control" id="checkout-township" name="township">
                    <option value="" disabled selected>Please choose your township</option>
                </select>
                @error('township')
                    <span class="help-inline">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="checkout-landmark">Colony / Suburb / Locality / Landmark</label>
                <input type="text" class="form-control" id="checkout-landmark" placeholder="Please Enter(Optional)"
                    name="landmark">
            </div>
            <div class="form-group col-md-6">
                <label for="checkout-address">Address</label>
                <input type="text" class="form-control" id="checkout-address"
                    placeholder="For Example: House# 123, Street# 123, ABC Road" name="full_address">
                @error('full_address')
                    <span class="help-inline">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
        <input type="submit" class="btn btn-info my-2 px-5 float-right" value="Save">
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#checkout-region').change(function() {
            var regionId = $(this).val();
            if (regionId) {
                $.ajax({
                    url: '/checkout/cities/' + regionId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#checkout-city').empty();
                        $('#checkout-city').append(
                            '<option value="" disabled selected>Please choose your city</option>'
                        );
                        $.each(data, function(key, value) {
                            $('#checkout-city').append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#checkout-city').empty();
                $('#checkout-city').append(
                    '<option value="" disabled selected>Please choose your city</option>');
            }
        });
    });

    $(document).ready(function() {
        $('#checkout-city').on('change', function() {
            var cityId = $(this).val();
            if (cityId) {
                $.ajax({
                    url: '/checkout/townships/' + cityId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#checkout-township').empty();
                        $('#checkout-township').append(
                            '<option value="" disabled selected>Please choose your township</option>'
                        );
                        $.each(data, function(key, value) {
                            $('#checkout-township').append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    },
                    error: function() {
                        console.log('Error occurred while loading townships.');
                    }
                });
            } else {
                $('#checkout-township').empty();
                $('#checkout-township').append(
                    '<option value="" disabled selected>Please choose your township</option>');
            }
        });
    });
</script>
