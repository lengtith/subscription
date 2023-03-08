<div class="container">
    @if (Session::has('success'))
    <p class="alert alert-success">
        {{ Session::get('success') }}
    </p>
    @endif
    @if (Session::has('error'))
    <p class="alert alert-danger">
        {{ Session::get('error') }}
    </p>
    @endif
    <form wire:submit.prevent="handleSubmit">
        <div class="d-flex flex-column">
            <div class="p-0">
                <h4 class="font-weight-bold text-theme">Subscription Request</h4>
            </div>

            <hr class="line">
            <div class="card-body d-flex flex-column gap-4 p-0">

                {{--
                //--------------------------------------------------------------
                // Subscription Offer For Investors
                // វិនិយោគិនសុំធ្វើបរិវិសកម្ម
                //--------------------------------------------------------------
                --}}

                <div class="card p-0">
                    <div class="h6 card-header text-uppercase">
                        Subscription Offer For Investors
                        <br>
                        <span>វិនិយោគិនសុំធ្វើបរិវិសកម្ម</span>
                    </div>
                    <div class="card-body row d-flex gap-3">
                        <div class="row justify-content-between text-left ">
                            <div class="form-group col flex-column d-flex gap-1">
                                <label class="form-control-label">
                                    Currency Type
                                    <span class="text-danger"> *</span>
                                    <br>
                                    <span>ប្រភេទរូបិបណ្ណ</span>
                                </label>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="currencyType"
                                            wire:model="currency" value="KHR">
                                        KHR
                                    </label>
                                    <span>/ រៀល</span>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="currencyType"
                                            wire:model="currency" value="USD">
                                        USD
                                    </label>
                                    <span>/ ដុល្លារ</span>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex gap-3">
                            <div class="form-group col d-flex flex-column gap-1">
                                <label class="form-control-label">
                                    Price per Offer Share
                                    <span class="text-danger"> *</span>
                                    <br>
                                    <span>ថ្លៃលក់ក្នុងមួយឯកតាភាគហ៊ុនបោះផ្សាយលក់</span>
                                </label>
                                @if ($currency == 'KHR')
                                <div class="input-group mb-3">
                                    <input disabled type="text" class="form-control" value="{{ $company->khr_price }}"
                                        aria-describedby="currency1">
                                    <span class="input-group-text" id="currency1">៛</span>
                                </div>
                                @else
                                <div class="input-group mb-3">
                                    <input disabled type="text" class="form-control" value="{{ $company->usd_price }}"
                                        aria-describedby="currency2">
                                    <span class="input-group-text" id="currency2">$</span>
                                </div>
                                @endif
                            </div>
                            <div class="form-group col">
                                <label class="form-control-label">
                                    Total number of Offer Shares for subscription
                                    <span class="text-danger"> *</span>
                                    <br>
                                    <span>ចំនួនភាគហ៊ុនបោះផ្សាយលក់សរុបដែលស្នើសុំធ្វើបរិវិសកម្ម</span>
                                </label>
                                <input type="text" class="form-control" wire:model="quantity">
                                <span class="text-danger">
                                    @error('quantity')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row d-flex gap-3">
                            <div class="form-group col">
                                <label class="form-control-label">
                                    Total value for subscription
                                    <span class="text-danger"> *</span>
                                    <br>
                                    <span>ចំនួនទឹកប្រាក់សរុបដែលត្រូវទូទាត់សម្រាប់ការស្នើសុំធ្វើបរិវិសកម្ម</span>
                                </label>
                                @if ($currency == 'KHR')
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" wire:model="amount" aria-describedby="KHR">
                                    <span class="input-group-text" id="KHR">៛</span>
                                </div>
                                @else
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" wire:model="amount" aria-describedby="USD">
                                    <span class="input-group-text" id="USD">$</span>
                                </div>
                                @endif
                                <span class="text-danger">
                                    @error('amount')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group col">
                                <label class="form-control-label">
                                    Actual deposit in subscription
                                    <span class="text-danger"> *</span>
                                    <br>
                                    <span>ចំនួនទឹកប្រាក់តម្កល់ជាក់ស្ដែងសម្រាប់ការស្នើសុំធ្វើបរិវិសកម្ម</span>
                                </label>
                                <input type="text" class="form-control" wire:model="actual_deposit">
                                <span class="text-danger">
                                    @error('actual_deposit')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>


                        <div class="row justify-content-between text-left ">
                            <div class="form-group col flex-column d-flex gap-1">
                                <label class="form-control-label">
                                    Attachment
                                    <span class="text-danger"> *</span>
                                    <br>
                                    <span>ឯកសារភ្ជាប់</span>
                                </label>
                                <div class="d-flex flex-column gap-2">
                                    @foreach ($payment_method as $method )
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="{{ $method->id }}"
                                            wire:model="payment_method_id" id="{{ $method->name }}">
                                        <label class="form-check-label" for="{{ $method->name }}">{{ $method->name
                                            }}</label>
                                        <br>
                                        <span>{{ $method->description }}</span>
                                    </div>
                                    @endforeach
                                    <input type="file" class="form-control" wire:model="payment_attach">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{--
                //--------------------------------------------------------------
                // Refund Information
                // ព័ត៌មានពាក់ព័ន្ធនឹងការផ្ទេរប្រាក់
                //--------------------------------------------------------------
                --}}
                <div class="card p-0">
                    <div class="h6 card-header text-uppercase">
                        Refund Information
                        <br>
                        <span>ព័ត៌មានពាក់ព័ន្ធនឹងការផ្ទេរប្រាក់</span>
                    </div>
                    <div class="card-body row d-flex gap-3">

                        <div class="row justify-content-between text-left ">
                            <div class="form-group col flex-column d-flex gap-1">
                                <div class="d-flex flex-column gap-2">
                                    @foreach ($refund_method as $method)

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="{{ $method->id }}"
                                            wire:model="refund_method_id" id="{{ $method->name }}">
                                        <label class="form-check-label"
                                            for="{{ $method->name }}">{{$method->name}}</label>
                                        <br>
                                        <span>{{ $method->description }}</span>
                                    </div>
                                    @endforeach

                                    <div id="bankForm">
                                        <div class="p-4 rounded-1 d-flex flex-column gap-2">
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label for="staticEmail" class="form-control-label">Bank
                                                        Name</label>
                                                    <span> / ឈ្មោះធនាគារ</span>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" readonly class="form-control"
                                                        wire:model="bank_name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label for="staticEmail" class="form-control-label">Account
                                                        Name</label>
                                                    <span> / ឈ្មោះគណនី</span>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" readonly class="form-control"
                                                        wire:model="bank_acc_name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label for="staticEmail" class="form-control-label">Account
                                                        Number</label>
                                                    <span> / លេខគណនី</span>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" readonly class="form-control"
                                                        wire:model="bank_acc_number">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label for="staticEmail" class="form-control-label">Currency
                                                        Type
                                                        <span> / ប្រភេទរូបិយប័ណ្ណ</span>
                                                    </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" readonly class="form-control"
                                                        wire:model="bank_acc_currency">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="sumbit" class="btn btn-primary">Button</button>
    </form>
</div>