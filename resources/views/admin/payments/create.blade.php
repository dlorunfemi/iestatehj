@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.payment.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.payments.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('tenant_id') ? 'has-error' : '' }}">
              <label for="tenant">{{ trans('global.payment.fields.tenant') }}*</label>
              <select name="tenant_id" id="tenant" class="form-control select2" onchange="fetchData(this.value)">
                @foreach($tenants as $id => $tenant)
                <option value="{{ $id }}" {{ (isset($payment) && $payment->tenant ? $payment->tenant->id : old('tenant_id')) == $id ? 'selected' : '' }}>{{ $tenant }}</option>
                @endforeach
              </select>
              @if($errors->has('tenant_id'))
              <p class="help-block">
                {{ $errors->first('tenant_id') }}
              </p>
              @endif
            </div>
            <div class="form-group {{ $errors->has('property_id') ? 'has-error' : '' }}">
                <label for="property">{{ trans('global.payment.fields.property') }}*</label>
                <select name="property_id" id="property" class="form-control select2" readonly>
                    <option value="">{{ trans('global.pleaseSelect') }} Tenant</option>
                </select>
                @if($errors->has('property_id'))
                    <p class="help-block">
                        {{ $errors->first('property_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('landlord_id') ? 'has-error' : '' }}">
                <label for="landlord">{{ trans('global.payment.fields.landlord') }}*</label>
                <select name="landlord_id" id="landlord" class="form-control select2" readonly>
                  <option value="">{{ trans('global.pleaseSelect') }} Tenant</option>
                </select>
                @if($errors->has('landlord_id'))
                    <p class="help-block">
                        {{ $errors->first('landlord_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('apartment_id') ? 'has-error' : '' }}">
                <label for="apartment">{{ trans('global.payment.fields.apartment') }}*</label>
                <select name="apartment_id" id="apartment" class="form-control select2" readonly>
                  <option value="">{{ trans('global.pleaseSelect') }} Tenant</option>
                </select>
                @if($errors->has('apartment_id'))
                    <p class="help-block">
                        {{ $errors->first('apartment_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('annual_charge') ? 'has-error' : '' }}">
                <label for="annual_charge">{{ trans('global.payment.fields.annual_charge') }}*</label>
                <input type="number" id="annual_charge" name="annual_charge" class="form-control" value="{{ old('annual_charge', isset($payment) ? $payment->annual_charge : '') }}" step="0.01" readonly>
                @if($errors->has('annual_charge'))
                    <p class="help-block">
                        {{ $errors->first('annual_charge') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.annual_charge_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('service_charge') ? 'has-error' : '' }}">
                <label for="service_charge">{{ trans('global.payment.fields.service_charge') }}</label>
                <input type="number" id="service_charge" name="service_charge" class="form-control" value="{{ old('service_charge', isset($payment) ? $payment->service_charge : '') }}" step="0.01" readonly>
                @if($errors->has('service_charge'))
                    <p class="help-block">
                        {{ $errors->first('service_charge') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.service_charge_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('legal_fee') ? 'has-error' : '' }}">
                <label for="legal_fee">{{ trans('global.payment.fields.legal_fee') }}</label>
                <input type="number" id="legal_fee" name="legal_fee" class="form-control" value="{{ old('legal_fee', isset($payment) ? $payment->legal_fee : '') }}" step="0.01" readonly>
                @if($errors->has('legal_fee'))
                    <p class="help-block">
                        {{ $errors->first('legal_fee') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.legal_fee_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('caution_deposit') ? 'has-error' : '' }}">
                <label for="caution_deposit">{{ trans('global.payment.fields.caution_deposit') }}</label>
                <input type="number" id="caution_deposit" name="caution_deposit" class="form-control" value="{{ old('caution_deposit', isset($payment) ? $payment->caution_deposit : '') }}" step="0.01" readonly>
                @if($errors->has('caution_deposit'))
                    <p class="help-block">
                        {{ $errors->first('caution_deposit') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.caution_deposit_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('agency_fee') ? 'has-error' : '' }}">
                <label for="agency_fee">{{ trans('global.payment.fields.agency_fee') }}</label>
                <input type="number" id="agency_fee" name="agency_fee" class="form-control" value="{{ old('agency_fee', isset($payment) ? $payment->agency_fee : '') }}" step="0.01" readonly>
                @if($errors->has('agency_fee'))
                    <p class="help-block">
                        {{ $errors->first('agency_fee') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.agency_fee_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('management_fee') ? 'has-error' : '' }}">
                <label for="management_fee">{{ trans('global.payment.fields.management_fee') }}</label>
                <input type="number" id="management_fee" name="management_fee" class="form-control" value="{{ old('management_fee', isset($payment) ? $payment->management_fee : '') }}" step="0.01" readonly>
                @if($errors->has('management_fee'))
                    <p class="help-block">
                        {{ $errors->first('management_fee') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.management_fee_helper') }}
                </p>
            </div>
            <hr>
            <div class="form-group {{ $errors->has('amount_paid') ? 'has-error' : '' }}">
                <label for="amount_paid">{{ trans('global.payment.fields.amount_paid') }}</label>
                <input type="number" id="amount_paid" name="amount_paid" class="form-control" value="{{ old('amount_paid', isset($payment) ? $payment->amount_paid : '') }}" step="0.01">
                @if($errors->has('amount_paid'))
                    <p class="help-block">
                        {{ $errors->first('amount_paid') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.amount_paid_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('landlord_account') ? 'has-error' : '' }}">
                <label for="landlord_account">{{ trans('global.payment.fields.landlord_account') }}</label>
                <input type="number" id="landlord_account" name="landlord_account" class="form-control" value="{{ old('landlord_account', isset($payment) ? $payment->landlord_account : '') }}" step="0.01">
                @if($errors->has('landlord_account'))
                    <p class="help-block">
                        {{ $errors->first('landlord_account') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.landlord_account_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('company_account') ? 'has-error' : '' }}">
                <label for="company_account">{{ trans('global.payment.fields.company_account') }}</label>
                <input type="number" id="company_account" name="company_account" class="form-control" value="{{ old('company_account', isset($payment) ? $payment->company_account : '') }}" step="0.01">
                @if($errors->has('company_account'))
                    <p class="help-block">
                        {{ $errors->first('company_account') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.company_account_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('payment_date') ? 'has-error' : '' }}">
                <label for="payment_date">{{ trans('global.payment.fields.payment_date') }}*</label>
                <input type="text" id="payment_date" name="payment_date" class="form-control date" value="{{ date('Y-m-d H:i:s') }}" readonly>
                @if($errors->has('payment_date'))
                    <p class="help-block">
                        {{ $errors->first('payment_date') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.payment_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('rent_from') ? 'has-error' : '' }}">
                <label for="rent_from">{{ trans('global.payment.fields.rent_from') }}*</label>
                <input type="text" id="rent_from" name="rent_from" class="form-control date" value="{{ old('rent_from', isset($payment) ? $payment->rent_from : '') }}">
                @if($errors->has('rent_from'))
                    <p class="help-block">
                        {{ $errors->first('rent_from') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.rent_from_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('rent_to') ? 'has-error' : '' }}">
                <label for="rent_to">{{ trans('global.payment.fields.rent_to') }}*</label>
                <input type="text" id="rent_to" name="rent_to" class="form-control date" value="{{ old('rent_to', isset($payment) ? $payment->rent_to : '') }}">
                @if($errors->has('rent_to'))
                    <p class="help-block">
                        {{ $errors->first('rent_to') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.rent_to_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('payment_type') ? 'has-error' : '' }}">
                <label for="payment_type">{{ trans('global.payment.fields.payment_type') }}*</label>
                <select id="payment_type" name="payment_type" class="form-control">
                    <option value="" readonly {{ old('payment_type', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\Payment::PAYMENT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_type', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_type'))
                    <p class="help-block">
                        {{ $errors->first('payment_type') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('bank_name') ? 'has-error' : '' }}">
                <label for="bank_name">{{ trans('global.payment.fields.bank_name') }}</label>
                <input type="text" id="bank_name" name="bank_name" class="form-control" value="{{ old('bank_name', isset($payment) ? $payment->bank_name : '') }}">
                @if($errors->has('bank_name'))
                    <p class="help-block">
                        {{ $errors->first('bank_name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.bank_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('cheque_no') ? 'has-error' : '' }}">
                <label for="cheque_no">{{ trans('global.payment.fields.cheque_no') }}</label>
                <input type="text" id="cheque_no" name="cheque_no" class="form-control" value="{{ old('cheque_no', isset($payment) ? $payment->cheque_no : '') }}">
                @if($errors->has('cheque_no'))
                    <p class="help-block">
                        {{ $errors->first('cheque_no') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.cheque_no_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('document') ? 'has-error' : '' }}">
                <label for="document">{{ trans('global.payment.fields.document') }}</label>
                <div class="needsclick dropzone" id="document-dropzone">

                </div>
                @if($errors->has('document'))
                    <p class="help-block">
                        {{ $errors->first('document') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.document_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('note') ? 'has-error' : '' }}">
                <label for="note">{{ trans('global.payment.fields.note') }}</label>
                <textarea id="note" name="note" class="form-control ">{{ old('note', isset($payment) ? $payment->note : '') }}</textarea>
                @if($errors->has('note'))
                    <p class="help-block">
                        {{ $errors->first('note') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('global.payment.fields.note_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('is_full_payment') ? 'has-error' : '' }}">
                <label for="is_full_payment">{{ trans('global.payment.fields.is_full_payment') }}</label>
                <select id="is_full_payment" name="is_full_payment" class="form-control" onchange="isPayment(this.value)">
                    <option value="" {{ old('is_full_payment', null) === null ? 'selected' : '' }}>@lang('global.pleaseSelect')</option>
                    @foreach(App\Payment::IS_FULL_PAYMENT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('is_full_payment', null) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_full_payment'))
                    <p class="help-block">
                        {{ $errors->first('is_full_payment') }}
                    </p>
                @endif
            </div>
            <input type="hidden" id="is_confirm_by_id" name="is_confirm_by_id" value="{{ $auth->id }}">
            <input type="hidden" id="is_part_payment" name="is_part_payment" value="No">
            <input type="hidden" name="created_by_id" id="created_by" value="{{ $auth->id }}">
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script type='text/javascript'>
   function fetchData(id){
     $('#apartment').empty();
     $.get('create/gettenant/'+id, function( data ) {
       console.log(data);
       var tenant = data.tenant;
       var property = data.property;
       var landlord = data.landlord;
       var apartment = data.vacant;
       var vacant = data.vacant;
       console.log(tenant);
       console.log(property);
       console.log(landlord);
       $('#property').empty();
       $('#property').append($('<option/>', {
           value: property.id,
           text : property.name
       }));
       $('#landlord').empty();
       $('#landlord').append($('<option/>', {
           value: landlord.id,
           text : landlord.name
       }));
       $('#apartment').empty();
       $('#apartment').append($('<option/>', {
           value: apartment.id,
           text : apartment.description
       }));
       $('#annual_charge').empty();
       $('#annual_charge').val(vacant.rent);
      });
   }

   function isPayment(id) {
     console.log(id);
     if (id === 'No') {
       $('#is_part_payment').empty();
       $('#is_part_payment').val('Yes');
     }
   }
</script>
<script>
    var uploadedDocumentMap = {}
Dropzone.options.documentDropzone = {
    url: '{{ route('admin.payments.storeMedia') }}',
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
      uploadedDocumentMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocumentMap[file.name]
      }
      $('form').find('input[name="document[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($payment) && $payment->document)
          var files =
            {!! json_encode($payment->document) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@stop
