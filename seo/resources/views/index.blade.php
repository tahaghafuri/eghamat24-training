@extends('layouts.app')
@section('name','صفحه اصلی')
@section('style','.u-section-1 .u-sheet-1{min-height: 500px;}.u-section-1 .u-form-1{height: 154px;width: 570px;margin: 60px auto;}@media (max-width: 767px) {.u-section-1 .u-form-1{width: 540px;}}@media (max-width: 575px){.u-section-1 .u-form-1{width: 340px;}}')
@section('content')
<section class="u-clearfix u-section-1" id="sec-a15b">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
      <div class="u-form u-form-1">
        <form action="{{ env('APP_URL') }}/analyze/" method="POST" style="padding: 10px;">
          @csrf
          <div class="u-form-email u-form-group u-label-none">
            <label for="url" class="u-label">آدرس سایت</label>
            <input type="text" placeholder="آدرس سایت" id="url" name="url" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
          </div>
          <center>
            <input type="submit" value="آنالیز کن" class="u-btn u-btn-submit u-button-style">
          </center>
        </form>
      </div>
    </div>
</section>
@endsection