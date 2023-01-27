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
        <label for="">يناير</label>
        <input type="text" class="form-control @error('january') is-invalid @enderror" name="january"
            value="{{old('january', $payment->january)}}">
        @error('january')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="">فبراير</label>
        <input type="text" class="form-control @error('february') is-invalid @enderror" name="february"
            value="{{old('february', $payment->february)}}">
        @error('february')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="">مارس</label>
        <input type="text" class="form-control @error('march') is-invalid @enderror" name="march"
            value="{{old('march', $payment->march)}}">
        @error('march')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="">ابريل</label>
        <input type="text" class="form-control @error('april') is-invalid @enderror" name="april"
            value="{{old('april', $payment->april)}}">
        @error('april')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="">مايو</label>
        <input type="text" class="form-control @error('may') is-invalid @enderror" name="may"
            value="{{old('may', $payment->may)}}">
        @error('may')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="">يونيو</label>
        <input type="text" class="form-control @error('june') is-invalid @enderror" name="june"
            value="{{old('june', $payment->june)}}">
        @error('june')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="">يوليو</label>
        <input type="text" class="form-control @error('july') is-invalid @enderror" name="july"
            value="{{old('july', $payment->july)}}">
        @error('july')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="">اغسطس</label>
        <input type="text" class="form-control @error('ougust') is-invalid @enderror" name="ougust"
            value="{{old('ougust', $payment->ougust)}}">
        @error('ougust')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="">سبتمبر</label>
        <input type="text" class="form-control @error('september') is-invalid @enderror" name="september"
            value="{{old('september', $payment->september)}}">
        @error('september')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="">اكتوبر</label>
        <input type="text" class="form-control @error('october') is-invalid @enderror" name="october"
            value="{{old('october', $payment->october)}}">
        @error('october')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="">نوفمبر</label>
        <input type="text" class="form-control @error('november') is-invalid @enderror" name="november"
            value="{{old('november', $payment->november)}}">
        @error('november')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="">ديسمبر</label>
        <input type="text" class="form-control @error('december') is-invalid @enderror" name="december"
            value="{{old('december',  $payment->december)}}">
        @error('december')
            <p class="invalid-feedback">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">{{ $button }}</button>
    </div>
