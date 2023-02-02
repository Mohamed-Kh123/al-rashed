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
        <input type="hidden" name="client_id" value="{{$client->id}}">
        <input type="text" class="form-control @error('client_id') is-invalid @enderror"
            value="{{$client->name}}">
        @error('january')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>

        
    <div class="form-group">
        <label for="">قيمة الدفعة</label>
        <input type="text" class="form-control @error('amount') is-invalid @enderror" name="amount"
            value="{{$client->deserved_amount}}">
        @error('amount')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="">تاريخ الدفعة</label>
        <input type="date" class="form-control @error('date') is-invalid @enderror" name="date">
        @error('date')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">{{ $button }}</button>
    </div>
