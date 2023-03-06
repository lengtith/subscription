<div class="my-5 w-1200 m-auto">
    {{-- @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    @if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session('message') }}
    </div>
    @endif --}}
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
                                            id="investorType1" value="individual">
                                        <label class="form-check-label" for="investorType1">Individual</label>
                                        <br>
                                        <span>វិនិយោគិនជារូបវន្តបុគ្គល</span>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="investorType"
                                            id="investorType2" value="legal_entity">
                                        <label class="form-check-label" for="investorType2">Legal Entity</label>
                                        <br>
                                        <span>វិនិយោគិនជានីតិបុគ្គល</span>
                                    </div>
                                </div>
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
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                <label class="form-control-label">
                                    Trading Account Name (English)
                                    <span class="text-danger"> *</span>
                                    <br>
                                    <span>ឈ្មោះគណនីជួញដូរ (អង់គ្លេស)</span>
                                </label>
                                <input type="text" class="form-control" wire:model="english_trading_name">
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
                                <input type="text" class="form-control" wire:model="trading_acc_number">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                <label class="form-control-label">
                                    Investor Identity Number
                                    <span class="text-danger"> *</span>
                                    <br>
                                    <span>លេខអត្ដសញ្ញាណវិនិយោគិន</span>
                                </label>
                                <input type="text" class="form-control" wire:model="investor_id">
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
                                <input type="text" class="form-control" wire:model="contact">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                <label class="form-control-label">
                                    Email Address
                                    <span class="text-danger"> *</span>
                                    <br>
                                    <span>អ៊ីម៉ែល</span>
                                </label>
                                <input type="text" class="form-control" wire:model="email">
                                {{ $email }}
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
                                    <span>ប្រភេទរូបិបណ្ណវត្ថុ</span>
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
                                    <input disabled type="text" class="form-control" wire:model="khr_price"
                                        aria-describedby="currency1">
                                    <span class="input-group-text" id="currency1">៛</span>
                                </div>
                                @else
                                <div class="input-group mb-3">
                                    <input disabled type="text" class="form-control" wire:model="usd_price"
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
                                <input type="text" class="form-control" wire:model="amount">
                            </div>
                            <div class="form-group col">
                                <label class="form-control-label">
                                    Actual deposit in subscription
                                    <span class="text-danger"> *</span>
                                    <br>
                                    <span>ចំនួនទឹកប្រាក់តម្កល់ជាក់ស្ដែងសម្រាប់ការស្នើសុំធ្វើបរិវិសកម្ម</span>
                                </label>
                                <input type="text" class="form-control" wire:model="actual_deposit">
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
                                        <input class="form-check-input" type="radio" name="investorType" id="1"
                                            value="{{ $method->id }}">
                                        <label class="form-check-label" for="1">{{ $method->name }}</label>
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
                // Payment Method
                // វិធីសាស្រ្ដបង់ប្រាក់
                //--------------------------------------------------------------
                --}}

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
                                        <input class="form-check-input" type="radio" name="refundMethod" id="refund1"
                                            value="{{ $method->id }}">
                                        <label class="form-check-label" for="refund1">{{$method->name}}</label>
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
                                                        <span> / ប្រភេទរូបិយប័ណ្ណ</span></label>

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
                                <input type="text" class="form-control" wire:model="english_name">
                            </div>
                            <div class="form-group col flex-column d-flex gap-1">
                                <label class="form-control-label">
                                    Investor’s Signature Attachment
                                    <span class="text-danger"> *</span>
                                    <br>
                                    <span>ឈ្មោះជាភាសាឡាតាំង</span>
                                </label>
                                <input type="text" class="form-control" wire:model="legal_entity_signature">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card p-0">
                    <div class="h6 card-header text-uppercase">
                        Deposit Account at ACLEDA Bank (SWIFT Code: ACLBKHPP)
                        <br>
                        <span>ពត៌មានទូទៅ</span>
                    </div>
                    <div class="card-body row d-flex gap-3">
                        <div class="row justify-content-between text-left ">
                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                <label class="form-control-label">
                                    Account Number for Deposit (KHR)
                                    <span class="text-danger"> *</span>
                                    <br>
                                    <span>ឈ្មោះជាភាសារខ្មែរ</span>
                                </label>
                                <input type="text" class="form-control" wire:model="khr_acc_num_for_deposit">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                <label class="form-control-label">
                                    Account Name for Deposit (KHR)
                                    <span class="text-danger"> *</span>
                                    <br>
                                    <span>ឈ្មោះជាភាសាឡាតាំង</span>
                                </label>
                                <input type="text" class="form-control" wire:model="khr_acc_name_for_deposit">
                            </div>
                        </div>
                        <div class="row justify-content-between text-left ">
                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                <label class="form-control-label">
                                    Account Number for Deposit (USD)
                                    <span class="text-danger"> *</span>
                                    <br>
                                    <span>ឈ្មោះជាភាសារខ្មែរ</span>
                                </label>
                                <input type="text" class="form-control" wire:model="usd_acc_num_for_deposit">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                <label class="form-control-label">
                                    Account Name for Deposit (USD)
                                    <span class="text-danger"> *</span>
                                    <br>
                                    <span>ឈ្មោះជាភាសាឡាតាំង</span>
                                </label>
                                <input type="text" class="form-control" wire:model="usd_acc_name_for_deposit">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="btn btn-primary mb-3 mt-3">Submit</button>
        <button class="btn btn-warning mb-3 mt-3 rounded-lg">Preview</button>
        <button class="btn btn-light mb-3 mt-3 ">Cancel</button>
    </form>
</div>
<style>
    .w-1200 {
        width: 960px;
    }

    label {
        font-size: 14px;
    }

    span {
        font-family: 'Khmer OS', 'Inter', 'Times New Roman';
        font-size: 12px;
    }
</style>