    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-group">
        <label for="">اسم المشترك</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
            value="{{ old('name', $client->name) }}">
        @error('name')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="">قيمة الاشتراك</label>
        <input type="text" class="form-control @error('deserved_amount') is-invalid @enderror" name="deserved_amount"
            value="{{ old('deserved_amount', $client->deserved_amount) }}">
        @error('deserved_amount')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="">رقم الجوال</label>
        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
            value="{{ old('phone_number', $client->phone_number) }}">
        @error('phone_number')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">{{ $button }}</button>
    </div>
