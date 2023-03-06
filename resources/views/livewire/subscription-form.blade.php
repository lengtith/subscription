<style>
    label {
        font-family: 'Inter', 'Khmer OS Battambang', 'Times New Roman';
        font-size: 14px;
    }

    span {
        font-family: 'Khmer OS Battambang', 'Inter', 'Times New Roman';
        font-size: 12px;
    }
</style>
<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-xl-8 p-0">
            <form>
                <div class="d-flex flex-column gap-4">
                    <div class="p-0">
                        <h4 class="font-weight-bold text-theme">Subscription Request</h4>
                    </div>

                    <hr class="line">

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
                                            <input class="form-check-input" type="radio" name="investorType" id="1"
                                                value="option1">
                                            <label class="form-check-label" for="1">Individual</label>
                                            <br>
                                            <span>វិនិយោគិនជារូបវន្តបុគ្គល</span>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="investorType" id="2"
                                                value="option2">
                                            <label class="form-check-label" for="2">Legal Entity</label>
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
                                    {{ $khmer_trading_name }}
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
                                    <input type="text" class="form-control" wire:model="trading_acc_security_firm">
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
                                <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                    <label class="form-control-label">
                                        Currency Type
                                        <span class="text-danger"> *</span>
                                        <br>
                                        <span>ប្រភេទរូបិបណ្ណវត្ថុ</span>
                                    </label>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="currencyType" wire:model="currency"
                                            value="khr">
                                            KHR
                                        </label>
                                        <span>/ រៀល</span>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="currencyType" wire:model="currency"
                                            value="usd">
                                            USD
                                        </label>
                                        <span>/ ដុល្លារ</span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                    <label class="form-control-label">
                                        Price per Offer Share
                                        <span class="text-danger"> *</span>
                                        <br>
                                        <span>ថ្លៃលក់ក្នុងមួយឯកតាភាគហ៊ុនបោះផ្សាយលក់</span>
                                    </label>
                                    @if ($currency == 'khr')
                                    <input disabled type="text" class="form-control" id="fname" name="fname"
                                        wire:model="unit_price" value="{{ $company->khr_price }}">
                                    @else
                                    <input disabled type="text" class="form-control" id="fname" name="fname"
                                        wire:model="unit_price" value="{{ $company->usd_price }}">
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-3">
                                <div class="form-group col">
                                    <label class="form-control-label">
                                        Total number of Offer Shares for subscription
                                        <span class="text-danger"> *</span>
                                        <br>
                                        <span>ចំនួនភាគហ៊ុនបោះផ្សាយលក់សរុបដែលស្នើសុំធ្វើបរិវិសកម្ម</span>
                                    </label>
                                    <input type="text" class="form-control" wire:model="quantity">
                                </div>
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

                            {{--
                            //--------------------------------------------------------------
                            // Payment Method
                            // វិធីសាស្រ្ដបង់ប្រាក់
                            //--------------------------------------------------------------
                            --}}

                            <div class="row justify-content-between text-left ">
                                <div class="form-group col flex-column d-flex gap-1">
                                    <label class="form-control-label">
                                        Payment Methods
                                        <span class="text-danger"> *</span>
                                        <br>
                                        <span>វិធីសាស្រ្ដបង់ប្រាក់</span>
                                    </label>
                                    <div class="d-flex flex-column gap-2">
                                        @foreach ($payment_method as $method )

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="investorType" id="1"
                                                value="{{ $method->id }}">
                                            <label class="form-check-label" for="1">{{ $method->name }}</label>
                                            <br>
                                            <span>ភាសាខ្មែរ</span>
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
                            Subscription Offer For Investors
                            <br>
                            <span>វិនិយោគិនសុំធ្វើបរិវិសកម្ម</span>
                        </div>
                        <div class="card-body row d-flex gap-3">

                            <div class="row justify-content-between text-left ">
                                <div class="form-group col flex-column d-flex gap-1">
                                    <label class="form-control-label">
                                        Refund Information
                                        <span class="text-danger"> *</span>
                                        <br>
                                        <span>ព័ត៌មានពាក់ព័ន្ធនឹងការផ្ទេរប្រាក់</span>
                                    </label>
                                    <div class="d-flex flex-column gap-2">
                                        @foreach ($refund_method as $method)

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="refundMethod"
                                                id="refund1" value="{{ $method->id }}">
                                            <label class="form-check-label" for="refund1">{{$method->name}}</label>
                                            <br>
                                            <span>ភាសារខ្មែរ</span>
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
                <!-- end card -->
                <button wire:click="upload" class="btn btn-primary mb-3 mt-3">Submit</button>
                <button type="button" class="btn btn-warning mb-3 mt-3 rounded-lg">Preview</button>
                <button type="submit" class="btn btn-light mb-3 mt-3 ">Cancel</button>

            </form>
            <!-- end row -->

        </div>
        <!-- end col -->
    </div>
    <!-- Row -->
</div>

<script>
    function bankForm(value){
        if(value == 3){
            document.getElementById("bankForm").style.display = "block";
        }else{
            document.getElementById("bankForm").style.display = "none";
        }
    }
</script>