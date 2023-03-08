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
                // Information Related to Investor
                // ពត៌មានទាក់ទងនឹងវិនិយោគិន
                //--------------------------------------------------------------
                --}}

                <div class="card p-0">
                    <div class="h6 card-header text-uppercase">
                        Information Related to Investor
                        <br>
                        <span>ពត៌មានទាក់ទងនឹងវិនិយោគិន</span>
                    </div>
                    <div class="card-body row d-flex gap-3">
                        <div class="row justify-content-between text-left ">
                            <div class="form-group col flex-column d-flex gap-1">
                                <label class="form-control-label">
                                    Investor Type
                                    <span class="text-danger"> *</span>
                                    <br>
                                    <span>ប្រភេទវិនិយោគិន</span>
                                </label>
                                <div class="d-flex">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="investorType"
                                            id="investorType1" value="individual" wire:model="investor_type">
                                        <label class="form-check-label" for="investorType1">Individual</label>
                                        <br>
                                        <span>វិនិយោគិនជារូបវន្តបុគ្គល</span>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="investorType"
                                            id="investorType2" value="legal_entity" wire:model="investor_type">
                                        <label class="form-check-label" for="investorType2">Legal Entity</label>
                                        <br>
                                        <span>វិនិយោគិនជានីតិបុគ្គល</span>
                                    </div>
                                </div>
                                <span class="text-danger">
                                    @error('investor_type')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                <label class="form-control-label">
                                    Trading Account Name (Khmer)
                                    <span class="text-danger"> *</span>
                                    <br>
                                    <span>ឈ្មោះគណនីជួញដូរ (ខ្មែរ)</span>
                                </label>
                                <input type="text" class="form-control" wire:model="khmer_trading_name">
                                <span class="text-danger">
                                    @error('khmer_trading_name')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                <label class="form-control-label">
                                    Trading Account Name (English)
                                    <span class="text-danger"> *</span>
                                    <br>
                                    <span>ឈ្មោះគណនីជួញដូរ (អង់គ្លេស)</span>
                                </label>
                                <input type="text" class="form-control" wire:model="english_trading_name">
                                <span class="text-danger">
                                    @error('english_trading_name')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                <label class="form-control-label">
                                    Trading Account No.
                                    <span class="text-danger"> *</span>
                                    <br>
                                    <span>លេខគណនីជួញដូរ</span>
                                </label>
                                <input type="number" class="form-control" wire:model="trading_acc_number">
                                <span class="text-danger">
                                    @error('trading_acc_number')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                <label class="form-control-label">
                                    Investor Identity Number
                                    <span class="text-danger"> *</span>
                                    <br>
                                    <span>លេខអត្ដសញ្ញាណវិនិយោគិន</span>
                                </label>
                                <input type="number" class="form-control" wire:model="investor_id">
                                <span class="text-danger">
                                    @error('investor_id')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col flex-column d-flex gap-1">
                                <label class="form-control-label">
                                    Security Firm
                                    <span class="text-danger"> *</span>
                                    <br>
                                    <span>ឈ្មោះក្រុមហ៊ុនមូលបត្រ</span>
                                </label>
                                <input type="text" class="form-control" wire:model="security_firm_name">
                                <span class="text-danger">
                                    @error('security_firm_name')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                <label class="form-control-label">
                                    Phone Number
                                    <span class="text-danger"> *</span>
                                    <br>
                                    <span>លេខទូរស័ព្ទ</span>
                                </label>
                                <input type="tel" class="form-control" wire:model="contact">
                                <span class="text-danger">
                                    @error('contact')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                <label class="form-control-label">
                                    Email Address
                                    <span class="text-danger"> *</span>
                                    <br>
                                    <span>អ៊ីម៉ែល</span>
                                </label>
                                <input type="email" class="form-control" wire:model="email">
                                <span class="text-danger">
                                    @error('email')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                {{--
                //--------------------------------------------------------------
                // Subscription Offer For Investors
                // វិនិយោគិនសុំធ្វើបរិវិសកម្ម
                //--------------------------------------------------------------
                --}}

                {{-- <div class="card p-0">
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
                                        <input disabled class="form-check-input" type="radio" name="currencyType"
                                            wire:model="currency" value="KHR">
                                        KHR
                                    </label>
                                    <span>/ រៀល</span>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input disabled class="form-check-input" type="radio" name="currencyType"
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
                                @if ('KHR')
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
                                <input disabled type="text" class="form-control" wire:model="quantity">
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
                                    <input disabled type="text" class="form-control" wire:model="amount" aria-describedby="KHR">
                                    <span class="input-group-text" id="KHR">៛</span>
                                </div>
                                @else
                                <div class="input-group mb-3">
                                    <input disabled type="text" class="form-control" wire:model="amount" aria-describedby="USD">
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
                                <input disabled type="text" class="form-control" wire:model="actual_deposit">
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
                                    <input disabled type="file" class="form-control" wire:model="payment_attach">
                                </div>
                            </div>
                        </div>
                    </div>

                </div> --}}

                {{--
                //--------------------------------------------------------------
                // Refund Information
                // ព័ត៌មានពាក់ព័ន្ធនឹងការផ្ទេរប្រាក់
                //--------------------------------------------------------------
                --}}
                {{-- <div class="card p-0">
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
                </div> --}}

                <div class="card p-0">
                    <div class="h6 card-header text-uppercase">
                        Investor’s Signature/Signature of Authorized Persona and Seal (for legal entity)
                        <br>
                        <span>ពត៌មានទូទៅ</span>
                    </div>
                    <div class="card-body row d-flex gap-3">
                        <div class="row justify-content-between text-left ">
                            <div class="form-group col flex-column d-flex gap-1">
                                <label class="form-control-label">
                                    Investor’s Name
                                    <span class="text-danger"> *</span>
                                    <br>
                                    <span>ឈ្មោះជាភាសារខ្មែរ</span>
                                </label>
                                <input type="text" class="form-control" wire:model="english_trading_name">
                            </div>
                            <div class="form-group col flex-column d-flex gap-1">
                                <label class="form-control-label">
                                    Investor’s Signature Attachment
                                    <span class="text-danger"> *</span>
                                    <br>
                                    <span>ហត្ថលេខា</span>
                                </label>
                                <input type="file" class="form-control" wire:model="file">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="sumbit" class="btn btn-primary">Button</button>
    </form>
</div>