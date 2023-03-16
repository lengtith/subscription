<div class="container mt-5 mb-5">

    <form class="was-validated">
        <div class="row g-3">

            <h4 class="font-weight-bold text-theme">Subscription Request</h4>

            <hr>

            <div class="card p-0">
                <div class="h6 card-header text-uppercase">
                    Information Related to Investor
                    <br>
                    <label>ពត៌មានទាក់ទងនឹងវិនិយោគិន</label>
                </div>
                <div class="card-body row g-3">
                    <div class="col-md-12">
                        <label class="form-label required">Investor Type / ប្រភេទវិនិយោគិន</label>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="investorType" name="individual"
                                wire:model="investor_type" value="individual">
                            <label for="investorType" class="form-label">Individual</label><br>
                            <label for="investorType" class="form-label">វិនិយោគិនជារូបវន្តបុគ្គល</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="investorType2" name="legalEntity"
                                wire:model="investor_type" value="legal_entity">
                            <label for="investorType2" class="form-label">Legal Entity</label><br>
                            <label for="investorType2" class="form-label">វិនិយោគិនជានីតិបុគ្គល</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="khmerTradingName" class="form-label required">Trading Account Name
                            (Khmer)</label><br>
                        <label for="khmerTradingName" class="form-label">ឈ្មោះគណនីជួញដូរ (ខ្មែរ)</label>
                        <input type="text" class="form-control" id="khmerTradingName" wire:model="khmer_trading_name"
                            required>
                        <div class="invalid-feedback">
                            @error('khmer_trading_name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="englishTradingName" class="form-label required">Trading Account Name
                            (English)</label><br>
                        <label for="englishTradingName" class="form-label">ឈ្មោះគណនីជួញដូរ (អង់គ្លេស)</label>
                        <input type="text" class="form-control" id="englishTradingName"
                            wire:model="english_trading_name" required>
                        <div class="invalid-feedback">
                            @error('english_trading_name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <label for="tradingAcc" class="form-label required">Trading Account No.</label><br>
                        <label for="tradingAcc" class="form-label">លេខគណនីជួញដូរ</label>
                        <input type="number" class="form-control" id="tradingAcc" wire:model="trading_acc_number"
                            required>
                        <div class="invalid-feedback">
                            @error('trading_acc_number')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <label for="investorId" class="form-label required">Investor Identity Number</label><br>
                        <label for="investorId" class="form-label">លេខអត្ដសញ្ញាណវិនិយោគិន</label>
                        <input type="number" class="form-control" id="investorId" wire:model="investor_id" required>
                        <div class="invalid-feedback">
                            @error('investor_id')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <label for="securityFirm" class="form-label required">Security Firm</label><br>
                        <label for="securityFirm" class="form-label">ឈ្មោះក្រុមហ៊ុនមូលបត្រ</label>
                        <input type="text" class="form-control" id="securityFirm" wire:model="security_firm_name"
                            required>
                        <div class="invalid-feedback">
                            @error('security_firm_name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <label for="phoneNumber" class="form-label required">Phone Number</label><br>
                        <label for="phoneNumber" class="form-label">លេខទូរស័ព្ទ</label>
                        <input type="text" class="form-control" id="phoneNumber" wire:model="contact" required>
                        <div class="invalid-feedback">
                            @error('contact')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <label for="emailAddress" class="form-label required">Email Address</label><br>
                        <label for="emailAddress" class="form-label">អ៊ីម៉ែល</label>
                        <input type="text" class="form-control" id="emailAddress" wire:model="email" required>
                        <div class="invalid-feedback">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <label class="form-label">Your signature for legal entity</label>
                        <label class="form-label">ស៊ីញ៉េ ឬហត្ថលេខាសម្រាប់និយោគិនជានីតិបុគ្គល</label>
                        <input type="file" class="form-control" wire:model="file">
                    </div>
                </div>
            </div>

            <div class="card p-0">
                <div class="h6 card-header text-uppercase">
                    Subscription Offer For Investors
                    <br>
                    <label>វិនិយោគិនសុំធ្វើបរិវិសកម្ម</label>
                </div>
                <div class="card-body row g-3">
                    <div class="col-md-12">
                        <label class="form-label">Currency Type / ប្រភេទរូបិបណ្ណ</label>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="currency" wire:model="currency"
                                value="KHR">
                            <label for="currency" class="form-label">KHR</label><br>
                            <label for="currency" class="form-label">ប្រាក់រៀល</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="currency2" wire:model="currency"
                                value="USD">
                            <label for="currency2" class="form-label">USD</label><br>
                            <label for="currency2" class="form-label">ប្រាក់ដុល្លារ</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="unit-price" class="form-label">Price per Offer Share</label><br>
                        <label for="unit-price" class="form-label">ថ្លៃលក់ក្នុងមួយឯកតាភាគហ៊ុនបោះផ្សាយលក់</label>

                        @if ($currency == 'KHR')
                        <div class="input-group mb-3">
                            <label class="form-control"> {{ $company->khr_price }} </label>
                            <span class="input-group-text">KHR</span>
                        </div>
                        @else
                        <div class="input-group mb-3">
                            <label class="form-control"> {{ $company->usd_price }} </label>
                            <span class="input-group-text">USD</span>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="unit-price" class="form-label required">Total number of Offer Shares for
                            subscription</label><br>
                        <label for="unit-price"
                            class="form-label">ចំនួនភាគហ៊ុនបោះផ្សាយលក់សរុបដែលស្នើសុំធ្វើបរិវិសកម្ម</label>

                        @if ($currency == 'KHR')
                        <div class="input-group mb-1">
                            <input type="number" class="form-control" wire:model="quantity" required>
                            <span class="input-group-text">ហ៊ុន</span>
                        </div>
                        <div class="text-danger">
                            @error('quantity')
                            {{ $message }}
                            @enderror
                        </div>
                        @else
                        <div class="input-group mb-1">
                            <input type="number" class="form-control" wire:model="quantity" required>
                            <span class="input-group-text">Share</span>
                        </div>
                        <div class="text-danger">
                            @error('quantity')
                            {{ $message }}
                            @enderror
                        </div>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="unit-price" class="form-label">Total value for subscription</label><br>
                        <label for="unit-price"
                            class="form-label">ចំនួនទឹកប្រាក់សរុបដែលត្រូវទូទាត់សម្រាប់ការស្នើសុំធ្វើបរិវិសកម្ម</label>

                        @if ($currency == 'KHR')
                        <div class="input-group mb-3">
                            <label class="form-control"> {{ $company->khr_price * $quantity }} </label>
                            <span class="input-group-text">KHR</span>
                        </div>
                        @else
                        <div class="input-group mb-3">
                            <label class="form-control"> {{ $company->usd_price * $quantity }} </label>
                            <span class="input-group-text">USD</span>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label for="unit-price" class="form-label required">Actual deposit for subscription</label><br>
                        <label for="unit-price"
                            class="form-label">ចំនួនទឹកប្រាក់តម្កល់ជាក់ស្ដែងសម្រាប់ការស្នើសុំធ្វើបរិវិសកម្ម</label>

                        @if ($currency == 'KHR')
                        <div class="input-group mb-1">
                            <input type="number" class="form-control" wire:model="actual_deposit" required>
                            <span class="input-group-text">KHR</span>
                        </div>
                        <div class="text-danger">
                            @error('actual_deposit')
                            {{ $message }}
                            @enderror
                        </div>
                        @else
                        <div class="input-group mb-1">
                            <input type="number" class="form-control" wire:model="actual_deposit" required>
                            <span class="input-group-text">USD</span>
                        </div>
                        <div class="text-danger">
                            @error('actual_deposit')
                            {{ $message }}
                            @enderror
                        </div>
                        @endif
                    </div>

                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label">Choose your payment options /
                                ជ្រើសរើសវិធីក្នុងការទូរទាត់ប្រាក់</label>

                            @foreach ($payment_method_tbl as $method )
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="{{ $method->id }}"
                                    wire:model="payment_method" id="{{ $method->name }}">
                                <label class="form-check-label" for="{{ $method->name }}">{{ $method->name
                                    }}</label>

                                <label>({{ $method->description }})</label>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            @if ($payment_method == 3)
                            <div class="form-group">
                                <input type="number" class="form-control" wire:model="cheque_number"
                                    placeholder="Cheque number" required>
                                <div class="invalid-feedback">
                                    Please select your currency
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Attachment file</label>
                        <label class="form-label">ឯកសារភ្ជាប់</label>
                        <input type="file" class="form-control" wire:model="payment_attach" required>
                        <div class="invalid-feedback">
                            @error('payment_attach')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="card p-0">
                <div class="h6 card-header text-uppercase">
                    Refund Information
                    <br>
                    <label>ព័ត៌មានពាក់ព័ន្ធនឹងការផ្ទេរប្រាក់</label>
                </div>
                <div class="card-body row g-3">
                    <div class="col-md-12">
                        <label class="form-label">Choose your refund options /
                            ជ្រើសរើសវិធីក្នុងការផ្ទេរប្រាក់ត្រលប់មកវិញ</label>

                        @foreach ($refund_method_tbl as $method )
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="{{ $method->id }}"
                                wire:model="refund_method" id="{{ $method->name }}">
                            <label class="form-check-label" for="{{ $method->name }}">{{ $method->name
                                }}</label>

                            <label>({{ $method->description }})</label>
                        </div>
                        @endforeach
                    </div>
                    @if ($refund_method == 3)
                    <div class="col-md-6">
                        <label class="form-label">Bank Name (ឈ្មោះធនាគារ)</label>
                        <input type="text" class="form-control" wire:model="bank_name" required>
                        <div class="invalid-feedback">
                            Type your bank name
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Bank Account Name (ឈ្មោះគណនី)</label>
                        <input type="text" class="form-control" wire:model="bank_acc_name" required>
                        <div class="invalid-feedback">
                            Type your bank account name
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Bank Account Number (លេខគណនី)</label>
                        <input type="text" class="form-control" wire:model="bank_acc_number" required>
                        <div class="invalid-feedback">
                            Type your bank account number
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Bank Account Currency (ប្រភេទរូបិយបណ្ណ)</label>
                        <select class="form-select" wire:model="bank_acc_currency" required>
                            <option>Select</option>
                            <option value="KHR">KHR</option>
                            <option value="USD">USD</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select your currency
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <hr>
        <button wire:click.prevent="handleSubmit" type="submit" class="btn btn-primary">
            <div wire:loading wire:target="handleSubmit">
                <i class="fas fa-spinner fa-spin"></i>
            </div>Submit
        </button>
        <button type="reset" wire:click="clearForm" class="btn btn-light">Cancel</button>
    </form>

</div>

<style>
    a {
        text-decoration: none;
    }

    .form-label.required:after {
        content: "*";
        color: red;
    }

    span {
        font-family: system-ui, -apple-system, "Segoe UI", 'Roboto', "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji", 'Khmer OS';
        font-size: 12px;
    }
</style>