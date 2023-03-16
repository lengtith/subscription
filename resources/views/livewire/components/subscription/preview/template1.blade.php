<!DOCTYPE html>
<html>

<head>
    <style>
        * {
            box-sizing: border-box;
        }

        .text-center {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            text-align: left;
        }

        .w-100 {
            width: 100%;
        }

        .w-50 {
            width: 50%;
        }

        .text-primary {
            color: #0044ff
        }

        .bg-primary {
            background-color: #0044ff
        }

        h5,
        h6,
        td,
        th,
        p,
        span {
            padding: 0px;
            margin: 0px;
            font-family: 'Khmer OS Battambang';
        }

        p {
            line-height: 1.8;
        }

        ul,
        ol,
        li,
            {
            padding: 0px 10px;
            margin: 0px;
            font-size: 10px;
        }

        .font-xs {
            font-size: 9px;
            font-weight: 300;
        }

        .font-sm {
            font-size: 10px;
            font-weight: 300;
        }

        .font-md {
            font-size: 12px;
            font-weight: 300;
        }

        .font-lg {
            font-size: 14px;
            font-weight: 300;
        }

        .p-1 {
            padding: 4px;
        }

        .pt-1 {
            padding-top: 4px;
        }

        .pb-1 {
            padding-bottom: 4px;
        }

        .pl-1 {
            padding-left: 4px;
        }

        .pr-1 {
            padding-right: 4px;
        }

        .py-1 {
            padding-bottom: 4px;
            padding-top: 4px;
        }

        .py-2 {
            padding-bottom: 8px;
            padding-top: 8px;
        }

        .px-1 {
            padding-left: 4px;
            padding-right: 4px;
        }

        .pt-1 {
            padding-top: 4px;
        }

        .my-1 {
            margin: 4px 0px;
        }

        .mb-1 {
            margin-bottom: 4px;
        }

        .mb-2 {
            margin-bottom: 8px;
        }

        .by-0 {
            border-top: 0px;
            border-bottom: 0px;
        }

        .table {
            display: table;
            width: 100%;
            border: 1px solid #999;
        }

        .table-row {
            display: table-row;
            width: 100%;
            clear: both;
        }

        .table-col {
            float: left;
            display: table-column;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <div class="w-100 justify d-inline">
        <div style="width: 70%; float: left;">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTE3AbV0jDJimdNIBvUYMIsssTkXpZ6oZ5HBlJ9E5j0&s"
                alt="Cinque Terre" height="50">
        </div>
        <div style="width:30%; float: right;">
            <p class="font-sm">លេខបរិវិសកម្ម៖ </p>
            <p class="font-sm text-primary">Subscription No.</p>
            <p class="font-sm">កាលបរិច្ឆេទ៖ </p>
            <p class="font-sm text-primary">Date</p>
        </div>
        <div style="clear: both"></div>
    </div>
    <div class="w-100 text-center">
        <h5 class="font-lg">ពាក្យស្នើសុំធ្វើបរិវិសកម្មមូលបត្រកម្មសិទ្ធិ</h5>
        <h5 class="font-lg">APPLICATION FORM TO SUBSCRIBE IPO SHARES</h5>
    </div>
    <div class="w-100 text-center py-1 bg-primary">
        <h6 class="font-md">ព័ត៌មានពាក់ព័ន្ធនឹងក្រុមបោះផ្សាយ ក្រុមហ៊ុនធានាទិញមូលបត្រ និងមូលបត្រកម្មសិទ្ធិ</h6>
        <h6 class="font-md">INFORMATION RELATED TO ISSUER, UNDERWRITER AND EQUITY SECURITIES</h6>
    </div>

    <div class="table" style="border: 0px;">
        <div class="table-row" style="border: 0px;">
            <div class="table-col" style="width: 25%; border: 0px; line-height: 1.8;">
                <p class="font-sm">ក្រុមហ៊ុនបោះផ្សាយ</p>
                <span class="font-sm text-primary">ISSUER</span>
            </div>
            <div class="table-col" style="border: 0px; line-height: 1.8;">
                <p class="font-sm">ក្រុមហ៊ុន ខេម ជ្ជីអេសអេម ម.ក.</p>
                <span class="font-sm text-primary">CAM GSM PLC.</span>
            </div>
        </div>
        <div class="table-row" style="border: 0px;">
            <div class="table-col" style="width: 25%; border: 0px; line-height: 1.8;">
                <p class="font-sm">ក្រុមហ៊ុនធានាទិញមូលបត្រ</p>
                <span class="font-sm text-primary">UNDERWRITER</span>
            </div>
            <div class="table-col" style="border: 0px; line-height: 1.8;">
                <p class="font-sm">ក្រុមហ៊ុន អេសប៊ីអាយ រ៉ូយ៉ាល់ ស៊ីឃ្យួរឹធី</p>
                <span class="font-sm text-primary">SBI Royal Securities Plc. ("SBIR")</span>
            </div>
        </div>
    </div>

    <div class="bg-primary p-1">
        <p class="font-sm">ព័ត៌មានពាក់ព័ន្ធនឹងវិនិយោគិន / <span>INFORMATION
                RELATED TO INVESTOR</span></p>
    </div>
    
    <div class="table mb-2">
        <div class="table-row">
            <div class="table-col pt-1 pb-1 pl-1" style="width: 25%;">
                <span class="font-sm">
                    <input type="checkbox" @if ($data['investor_type']=='individual' ) checked="checked" @endif>
                    វិនិយោគិនជារូបវន្ដបុគ្គល <span class="font-sm text-primary">/ Individual </span>
                </span>
            </div>
            <div class="table-col pt-1 pb-1 pl-1">
                <span class="font-sm">
                    <input type="checkbox" @if ($data['investor_type']=='legal_entity' ) checked="checked" @endif>
                    វិនិយោគិនជានីតិបុគ្គល <span class="font-sm text-primary">/ Legal Entity</span>
                </span>
            </div>
        </div>
        <div class="table-row">
            <div class="table-col pt-1 pb-1 pl-1" style="width: 25%; line-height: 1.6;">
                <p class="font-sm">ឈ្មោះគណនីជួញដូរ (ខ្មែរ)</p>
                <span class="font-sm text-primary">Trading Account Name (Khmer)</span>
            </div>
            <div class="table-col pt-1 pb-1 pl-1" style="line-height: 1.6; border-bottom: 0px;">
                <p class="font-sm">{{ $data['khmer_trading_name'] }}</p>
            </div>
        </div>
        <div class="table-row">
            <div class="table-col pt-1 pb-1 pl-1" style="width: 25%; line-height: 1.6;">
                <p class="font-sm">ឈ្មោះគណនីជួញដូរ (អង់គ្លេស)</p>
                <span class="font-sm text-primary">Trading Account Name (English)</span>
            </div>
            <div class="table-col pt-1 pb-1 pl-1" style="line-height: 1.6; border-bottom: 0px;">
                <p class="font-sm">{{ $data['khmer_trading_name'] }}</p>
            </div>
        </div>
        <div class="table-row">
            <div class="table-col pt-1 pb-1 pl-1" style="width: 25%; line-height: 1.6;">
                <p class="font-sm">លេខគណនីជួញដូរ</p>
                <span class="font-sm text-primary">Trading Account No.</span>
            </div>
            <div class="table-col pt-1 pb-1 pl-1" style="line-height: 1.6; border-bottom: 0px;">
                <p class="font-sm">{{ $data['trading_acc_number'] }}</p>
            </div>
        </div>
        <div class="table-row">
            <div class="table-col pt-1 pb-1 pl-1" style="width: 25%; line-height: 1.6;">
                <p class="font-sm">លេខអត្ដសញ្ញាណវិនិយោគិន</p>
                <span class="font-sm text-primary">Investor Identity Number (ID No)</span>
            </div>
            <div class="table-col pt-1 pb-1 pl-1" style="line-height: 1.6; border-bottom: 0px;">
                <p class="font-sm">{{ $data['investor_id'] }}</p>
            </div>
        </div>
        <div class="table-row">
            <div class="table-col pt-1 pb-1 pl-1" style="width: 25%; line-height: 1.6;">
                <p class="font-sm">លេខទូរស័ព្ទ</p>
                <span class="font-sm text-primary">Contact No</span>
            </div>
            <div class="table-col pt-1 pb-1 pl-1" style="width: 25%; line-height: 1.6; border-bottom: 0px;">
                <p class="font-sm">{{ $data['contact'] }}</p>
            </div>
            <div class="table-col pt-1 pb-1 pl-1" style="width: 25%; line-height: 1.6;">
                <p class="font-sm">អ៊ីម៉ែល</p>
                <span class="font-sm text-primary">Email Address</span>
            </div>
            <div class="table-col pt-1 pb-1 pl-1" style="line-height: 1.6; border-bottom: 0px;">
                <p class="font-sm">{{ $data['email'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-primary p-1">
        <p class="font-sm">
            វិនិយោគិនសុំធ្វើបរិវិសកម្ម /
            <span>SUBSCRIPTION OFFER FOR INVESTORS</span>
        </p>
    </div>

    <div class="table mb-2">
        <div class="table-row">
            <div class="table-col p-1" style="width: 50%; line-height: 1.6; padding-right: 6px;">
                <p class="font-sm">ថ្លៃលក់ក្នុងមួយឯកតាភាគហ៊ុនបោះផ្សាយលក់ (1)</p>
                <span class="font-sm text-primary">Price Per Offer Share</span>
            </div>
            <div class="table-col p-1" style="line-height: 1.6; border-bottom: 0px;">
                <p class="font-sm">{{ $data['unit_price'] }}</p>
            </div>
        </div>
        <div class="table-row">
            <div class="table-col p-1" style="width: 50%; line-height: 1.6; padding-right: 6px;">
                <p class="font-sm">ចំនួនភាគហ៊ុនបោះផ្សាយលក់សរុបដែលស្នើសុំធ្វើបរិវិសកម្ម (2)</p>
                <span class="font-sm text-primary">Total Number of Offer Shares for Subscription</span>
            </div>
            <div class="table-col p-1" style="line-height: 1.6; border-bottom: 0px;">
                <p class="font-sm">{{ $data['quantity'] }}</p>
            </div>
        </div>
        <div class="table-row">
            <div class="table-col p-1" style="width: 50%; line-height: 1.6; padding-right: 6px;">
                <p class="font-sm">ចំនួនទឹកប្រាក់សរុបដែលត្រូវទូទាត់សម្រាប់ការស្នើសុំធ្វើបរិវិសកម្ម (1)x(2)</p>
                <span class="font-sm text-primary">Total Value For Subscription</span>
            </div>
            <div class="table-col p-1" style="line-height: 1.6; border-bottom: 0px;">
                <p class="font-sm">{{ $data['unit_price']*$data['quantity'] }}</p>
            </div>
        </div>
        <div class="table-row">
            <div class="table-col p-1" style="width: 50%; line-height: 1.6; padding-right: 6px;">
                <p class="font-sm">ចំនួនទឹកប្រាក់តម្កល់ជាក់ស្ដែងសម្រាប់ការស្នើសុំធ្វើបរិវិសកម្ម</p>
                <span class="font-sm text-primary">Actual Deposit In Subscription</span>
            </div>
            <div class="table-col p-1" style="line-height: 1.6; border-bottom: 0px;">
                <p class="font-sm">{{ $data['actual_deposit'] }}</p>
            </div>
        </div>
        <div class="table-row">
            <div class="table-col pt-1 pb-1 pl-1" style="width: 25%; line-height: 1.6;">
                <span class="font-sm"><input type="checkbox" @if ($data['payment_method_id'] == 1 ) checked="checked" @endif>
                    វិក្ក័យបត្រដាក់ប្រាក់
                </span>
                <p class="font-sm">Deposit Slip</p>
            </div>
            <div class="table-col pt-1 pb-1 pl-1" style="width: 25%; line-height: 1.6;">
                <span class="font-sm"><input type="checkbox" @if ($data['payment_method_id'] == 2 ) checked="checked" @endif>
                    វិក្ក័យបត្រផ្ទេរប្រាក់
                </span>
                <p class="font-sm">Bank transfer reference</p>
            </div>
            <div class="table-col pt-1 pb-1 pl-1" style="width: 25%; line-height: 1.6;">
                <span class="font-sm"><input type="checkbox" @if ($data['payment_method_id'] == 3 ) checked="checked" @endif>
                    មូលប្បទានបត្រលេខ
                </span>
                <p class="font-sm">Cheque No {{ $data['cheque_number'] }}</p>
            </div>
            <div class="table-col pt-1 pb-1 pl-1" style="line-height: 1.6;">
                <span class="font-sm"><input type="checkbox" @if ($data['payment_method_id'] == 4 ) checked="checked" @endif>
                    ផ្សេងទៀត
                </span>
                <p class="font-sm">Other</p>
            </div>
        </div>
    </div>

    <div class="bg-primary p-1">
        <p class="font-sm">
            ព័ត៌មានពាក់ព័ន្ធនឹងការផ្ទេរប្រាក់ /
            <span>REFUND INFORMATION</span>
        </p>
    </div>
    <p class="font-xs">
        ករណីខ្ញុំមិនទទួលបានភាគហ៊ុនបោះផ្សាយលក់ទៅតាមការធ្វើបរិវិសកម្ម
        ខ្ញុំមានបំណងទទួលប្រាក់កក់បរិវិសកម្មដែលនៅសល់
        (ក្រោយពីការដកចេញនូវរាល់ការចំណាយប្រសិន​បើមាន)
        ដែលខ្ញុំបានតម្កល់ក្នុងគណនីក្រុមហ៊ុនបោះផ្សាយក្នុងការធ្វើបរិវិសកម្មតាមវិធីណាមួយដូចខាងក្រោម។
        <span class="text-primary">
            In case I do not receive the full amount of the Offer Shares that I
            subscribe, I would like to receive the remaining of the subscription
            deposit (after deduct all the expenses, if any) that I have deposited
            into the Issuer's Account during the subscription process by one of
            the following means:
        </span>
    </p>

    {{-- CUSTOM TABLE --}}

    <div class="table">
        <div class="table-row">
            <div class="table-col p-1" style="width: 5%">
                <input type="checkbox" @if ($data['payment_method_id'] == 1 ) checked="checked" @endif>
            </div>
            <div class="table-col" style="padding: 1.5px 4px;">
                <p class="font-xs">
                    ផ្ទេរត្រលប់ទៅគណនីជួញដូរខាងលើ
                    <span class="text-primary">
                        / Refund to the above trading account NO</span>
                </p>
            </div>
        </div>
        <div class="table-row">
            <div class="table-col p-1" style="width: 5%">
                <input type="checkbox" @if ($data['payment_method_id'] == 2 ) checked="checked" @endif>
            </div>
            <div class="table-col" style="padding: 1.5px 4px;">
                <p class="font-xs">
                    ដកជាសាច់ប្រាក់នៅធនាគារដែលបានកំណត់
                    <span class="text-primary">
                        / Refund by cash at the deposit bank</span>
                </p>
            </div>
        </div>
        <div class="table-row">
            <div class="table-col p-1" style="width: 5%; border-bottom: 0px;">
                <input type="checkbox" @if ($data['payment_method_id'] == 3 ) checked="checked" @endif>
            </div>
            <div class="table-col" style="padding: 1.5px 4px;">
                <ul>
                    <li>
                        <p class="font-xs">
                            ដកជាសាច់ប្រាក់នៅធនាគារដែលបានកំណត់
                            <span class="text-primary">
                                / Refund by cash at the deposit bank</span>
                        </p>
                    </li>
                    <li>
                        <p class="font-xs">
                            ឈ្មោះធនាគារ
                            <span class="text-primary"> / Bank Name: {{ $data['bank_name'] }}</span>
                        </p>
                    </li>
                    <li>
                        <p class="font-xs">
                            ឈ្មោះគណនី
                            <span class="text-primary"> / Account Name: {{ $data['bank_account_name'] }}</span>
                        </p>
                    <li>
                        <p class="font-xs">
                            លេខគណនី
                            <span class="text-primary"> / Account NO: {{ $data['bank_account_number'] }}</span>
                        </p>
                    </li>
                    <li>
                        <p class="font-xs">
                            ប្រភេទរូបិយប័ណ្ណ
                            <span class="text-primary"> / Currency Type: {{ $data['bank_account_currency'] }}</span>
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- End Custom Table --}}

    <p class="font-xs">
        (ក្រោយការដកចេញចំណាយពាក់ព័ន្ធសម្រាប់ការផ្ទេរប្រសិនបើមាន
        <span class="text-primary">
            / After deduction of related charges for such transfer, if any</span>)
    </p>

    <pagebreak />

    <p class="font-sm">
        <strong>សម្គាល់៖ </strong>
        សូមបញ្ជាក់ថានៅពេលផ្ទេរប្រាក់កក់ត្រឡប់ទៅវិនិយោគិនដែលមិនទទួលបានជោគជ័យ
        ម្ចាស់គណនី និងវិនិយោគិនដែលមិនទទទួលបានជោគជ័យ ត្រូវតែជាបុគ្គលតែមួយ។
        គណនីរួម មិនត្រូវបានអនុញ្ញាត និងមិនត្រូវបានទទួលទេ។
        <span class="text-primary">
            Please note that when making the refund, the account owner and
            unsuccessful investor must be the same person. Joint account is not
            allowed and will not be accepted.</span>
    </p>

    {{-- CUSTOM TABLE --}}

    <div class="table">
        <div class="table-row">
            <div class="table-col text-center" style="width: 60%">
                <p class="font-xs">
                    ហត្ថលេខារបស់វិនិយោគិន/ហត្ថលេខារបស់អ្នកតំណាង និងត្រា (សម្រាប់នីតិបុគ្គល)
                    <br>
                    <span class="text-primary">
                        Investor's Signature/Signature of Authorized Person and Seal (for legal entity)</span>
                </p>
            </div>
            <div class="table-col text-center">
                <p class="font-xs">
                    ភ្នាក់ងារក្រុមហ៊ុនមូលបត្រ
                    <br>
                    <span class="text-primary">Securities Representative</span>
                </p>
            </div>
        </div>
        <div class="table-row">
            <div class="table-col" style="width: 60%">
                <div style="height: 100px;"></div>
                <p class="font-xs">
                    ឈ្មោះ /
                    <span class="text-primary">
                        Name: {{ $data['english_trading_name'] }}</span>
                </p>
            </div>
            <div class="table-col">
                <div style="height: 100px;"></div>
                <p class="font-xs">
                    ឈ្មោះ /
                    <span class="text-primary">
                        Name</span>
                </p>
            </div>
        </div>
    </div>

    {{-- End Custom Table --}}

    <p class="font-xs pt-1">
        គណនីសម្រាប់ដាក់ទឹកប្រាក់តម្កល់នៅធនាគារអេស៊ីលីដា
        <br>
        <span class="text-primary">
            The accounts for the deposit at ACLEDA Bank (SWIFT Code: ACLBKHPP)</span>
    </p>

    {{-- CUSTOM TABLE --}}

    <div class="table">
        <div class="table-row">
            <div class="table-col text-center" style="width: 30%;">
                <p class="font-xs">
                    លេខគណនីសម្រាប់ដាក់ទឹកប្រាក់តម្កល់
                    <br>
                    <span class="text-primary">
                        Account Number for Deposit</span>
                </p>
            </div>
            <div class="table-col text-center" style="width: 40%;">
                <p class="font-xs">
                    ឈ្មោះគណនីសម្រាប់ដាក់ទឹកប្រាក់តម្កល់
                    <br>
                    <span class="text-primary">Account Name for Deposit</span>
                </p>
            </div>
            <div class="table-col text-center">
                <p class="font-xs">
                    រូបិយប័ណ្ណ
                    <br>
                    <span class="text-primary">Currency</span>
                </p>
            </div>
        </div>
        <div class="table-row">
            <div class="table-col text-center" style="width: 30%;">
                <p class="font-md">
                    00010010074966
                </p>
            </div>
            <div class="table-col text-center" style="width: 40%;">
                <p class="font-md">
                    CAM GSM PLC. - Subscription Account
                </p>
            </div>
            <div class="table-col text-center">
                <p class="font-md">
                    ប្រាក់រៀល <span class="text-primary">KHR</span>
                </p>
            </div>
        </div>
        <div class="table-row">
            <div class="table-col text-center" style="width: 30%;">
                <p class="font-md">
                    00010010074955
                </p>
            </div>
            <div class="table-col text-center" style="width: 40%;">
                <p class="font-md">
                    CAM GSM PLC. - Subscription Account
                </p>
            </div>
            <div class="table-col text-center">
                <p class="font-md">
                    ប្រាក់ដុល្លារអាមេរិក <span class="text-primary">USD</span>
                </p>
            </div>
        </div>
    </div>

    {{-- End Custom Table --}}

    <p class="font-sm">
        លោកអ្ន​ក​ គួរអាន និងយល់ពីខ្លឹមសារ នៃឯកសារផ្តល់ព័ត៌មានរបស់ក្រុមហ៊ុនបោះផ្សាយ
        មុនពេលដាក់ពាក្យស្នើសុំធ្វើបរិវិសកម្មមូលបត្រកម្មសិទ្ធិ។
        ប្រសិនបើលោកអ្នកមានចម្ងល់ ឬមន្ទិលសង្ស័យ
        លោកអ្នកអាចប្រឹក្សាជាមួយ ទីប្រឹក្សាផ្នែកច្បាប់ ហិរញ្ញវត្ថុ
        ឬទីប្រឹក្សាជំនាញឯករាជ្យដទៃទៀតរបស់លោកអ្នក។
        <span class="text-primary font-sm">
            Prior filling this application, investors are advised to read and
            understand the contents of the
            Disclosure
            Document of the listed company (“Disclosure Document”). If you have any
            doubt or matters contained
            herein,
            please consult your legal, financial advisor or other independent
            professional advisers.
        </span>
    </p>

    <p class="font-sm">
        មូលបត្រកម្មសិទ្ធិសរុបដែលត្រូវធ្វើសំណើរលក់ជាសាធារណៈមានចំនួនរហូតទៅដល់
        [៥២,៨៧៥,៩២៤] ឯកតាមូលបត្រកម្មសិទ្ធិប្រភេទ
        “ក”
        ដែលតម្លៃចារឹកក្នុងមួយឯកតាមូលបត្រកម្មសិទ្ធិស្មើនឹង [៣០០] រៀល
        (ភាគហ៊ុនបោះផ្សាយលក់)
        ហើយថ្លៃលក់ក្នុងមួយឯកតាភាគហ៊ុនបោះផ្សាយលក់ស្មើនឹង [២,២៧០] រៀល ([០,៥៧]
        ដុល្លារអាមេរិក)។
        មូលបត្រកម្មសិទ្ធិសរុបដែលលៃបម្រុងសម្រាប់៖
        <span class="text-primary font-sm">
            [ 52,875,924 ] class “A” new ordinary shares with a par value per share
            of KHR [ 300 ] (“Offer Share”)
            to be
            offered pursuant to Public Offering and the offering price per Offer
            Share has been set at KHR [ 2,270 ]
            or
            USD [ 0,57 ] which has reserves:
        </span>
    </p>

    <ol>
        <li>
            <p class="font-sm">
                មូលបត្រកម្មសិទ្ធិលៃបម្រុងទុកសម្រាប់និយោជិត មានចំនួន [ ៥,២៨៧,៥៩២ ]
                ​ឯកតាភាគហ៊ុនបោះផ្សាយលក់ ។
                <span class="text-primary font-sm">
                    [ 5,287,592 ] Offered Shares for ESOP.
                </span>
            </p>
        </li>
        <li>
            <p class="font-sm">
                វិនិយោគិនសាធារណៈ មានចំនួន [ ៤៧,៥៨៨,៣៣២ ] ឯកតាភាគហ៊ុនបោះផ្សាយលក់ ។
                <span class="text-primary font-sm">
                    [ 47,588,332 ] Offered Shares for​public investors.
                </span>
            </p>
        </li>
    </ol>

    <p class="font-sm">
        ការធ្វើបរិវិសកម្ម និងការទូទាត់ដែលធ្វើឡើងដោយអ្នកធ្វើបរិវិសកម្ម
        ត្រូវតែស្របទៅតាមលក្ខខណ្ឌដែលមានចែងក្នុងឯកសារផ្តល់ព័ត៌មាន។
        ខ្ញុំ/យើងខ្ញុំយល់ព្រម និងទទួលស្គាល់ថា
        ក្រុហ៊ុនបោះផ្សាយ
        មានសិទិ្ធបដិសេធក្នុងករណីដែលការស្នើសុំធ្វើបរិវិសកម្មណាមួយមិនគោរពតាមលក្ខខណ្ឌតម្រូវ។
        ខ្ញុំ/យើងខ្ញុំយល់ព្រមទិញភាគហ៊ុនបោះផ្សាយលក់ក្នុងចំនួន​ដូចបានកំណត់ខាងលើ
        ឬចំនួនភាគហ៊ុនបោះផ្សាយលក់ដែលក្រុមហ៊ុនបានបែងចែកមកឲ្យខ្ញុំ/យើងខ្ញុំ។
        ខ្ញុំ/យើងខ្ញុំ សូមសន្យាថា
        មិនលុបចោលការធ្វើបរិវិសកម្មរបស់ខ្ញុំ/យើងខ្ញុំទេ
        និងយល់ព្រមទទួលប្រាក់សងត្រឡប់មកវិញ
        ករណីដែលការធ្វើបរិវិសកម្មត្រូវបានបដិសេធ។ ខ្ញុំ/យើងខ្ញុំ
        យល់ស្របតាមលក្ខខណ្ឌនៃសំណើបោះផ្សាយលក់មូលបត្រកម្មសិទ្ធិជា
        សាធារណៈលើកដំបូងដូចមានចែងក្នុងឯកសារផ្តល់ព័ត៌មាន។
        ខ្ញុំ/យើងខ្ញុំទទួលស្គាល់ផងដែរថា
        ការវិនិយោគលើភាគហ៊ុនបោះផ្សាយលក់មានហានិភ័យពាក់ព័ន្ធ។
        <span class="text-primary font-sm">
            The subscription and payment made by subscriber shall be in accordance
            with the terms and conditions
            specified in the Disclosure Document. I/We hereby agree and acknowledge
            that the Issuer is entitled to
            refuse, if any subscription does not comply with the said terms and
            conditions. I/we undertake to
            purchase
            the number of Offer Shares as stated above or the number of Offer Shares
            allotted to me/us. I/We shall
            not
            cancel subscription and accept refund if the subscription is refused.
            I/We also hereby agree with the
            terms
            and conditions of initial public offering as specified in the Disclosure
            Document. I also acknowledge
            that
            the investment in the Offer Shares can be volatile.
        </span>
    </p>
    <p class="font-sm">
        ខ្ញុំ/យើងខ្ញុំ សូមអះអាងថា ខ្ញុំ/យើងខ្ញុំ បានអានឯកសារផ្តល់ព័ត៌មានដោយម៉ត់ចត់​
        និង យល់ព្រមលើលក្ខខណ្ឌ
        និងព័ត៌មានដែលមានក្នុងឯកសារផ្តល់ព័ត៌មាននេះ មុនពេលធ្វើបរិវិសកម្ម
        និងមិនមានការបញ្ចុះបញ្ចូលដោយភាគីណាមួយទេ។
        <span class="text-primary font-sm">
            I/we hereby declare that I/we have read and accepted the terms and
            conditions and information contained
            in
            the Disclosure Document before applying such Offer Shares, and have not
            relied on any third party.
        </span>
    </p>

    {{-- CUSTOM TABLE --}}

    <div class="table p-1">
        <div class="table-row">
            <div class="table-col" style="width: 5%; border:0px; padding-left: 8px;">
                <p>*</p>
            </div>
            <div class="table-col" style="border: 0px;">
                <p class="font-sm">
                    ក្រុមហ៊ុនធានាទិញមូលបត្រ ឬតំណាងភ្នាក់ងារលក់
                    ត្រូវពន្យល់វិនិយោគិនអំពីខ្លឹមសារនៃសេវាបរិវិសកម្មដែលមានចែងដូចខាងក្រោមនេះ។
                    <span class="text-primary font-sm">
                        The Underwriter or the authorized selling agents shall
                        explain to the undersigned
                        Investor
                        the
                        terms of the Subscription Service prescribed hereunder.
                    </span>
                </p>
            </div>
        </div>
        <div class="table-row">
            <div class="table-col" style="width: 5%; border:0px; padding-left: 8px;">
                <p>**</p>
            </div>
            <div class="table-col" style="border: 0px;">
                <p class="font-sm">
                    វិនិយោគិនទទួលខុសត្រូវលើលទ្ធផល
                    និងរាល់ហេតុការណ៍ទាំងឡាយដែលកើតឡើង
                    ឬដែលអាចនឹងកើតឡើងពាក់ព័ន្ធនឹងការធ្វើបរិវិសកម្មរបស់ក្រុមហ៊ុនបោះផ្សាយ
                    ហើយក្រុមហ៊ុនធានាទិញមូលបត្រ
                    និង/ឬតំណាងភ្នាក់ងារលក់ មិនទទួលខុសត្រូវលើលទ្ធផល
                    និងរាល់ហេតុការណ៍ទាំងនោះទេ។
                    <span class="text-primary font-sm">
                        The undersigned Investor hereby assumes full
                        responsibility for the outcome and all the
                        matters
                        that arise or eventuate in connection the Subscription
                        process of the Issuer and the
                        Underwriter
                        and/or authorized selling agents do not and shall not
                        take any responsibility with
                        respect
                        to
                        such outcome or matters.
                    </span>
                </p>
            </div>
        </div>
    </div>

    {{-- End Custom Table --}}

    <pagebreak />

    <div class="w-100 text-center">
        <h6 class="font-md">សេវាបរិវិសកម្ម</h6>
        <h6 class="font-md">SUBSCRIPTION SERVICE</h6>
    </div>

    <p class="font-sm">
        វិនិយោគិន និង ក្រុមហ៊ុនធានាទិញមូលបត្រ បានអាន
        និងយល់ព្រមលើលក្ខខណ្ឌនៃសេវាបរិវិសកម្មដូចខាងក្រោម
        <span class="text-primary font-sm">
            / The Investor and the Underwriter have hereby reviewed and agreed on
            the following terms and conditions
            of
            this Subscription Service:
        </span>
    </p>

    <ol>
        <li>
            <p class="font-sm bg-primary px-1">
                លក្ខខណ្ឌទូទៅ
                <span class="text-primary font-sm">
                    / GENERAL CONDITIONS
                </span>
            </p>
            <ol>
                <li>
                    <p class="font-sm">
                        ការដាក់ពាក្យស្នើសុំ
                        ត្រូវធ្វើលើពាក្យស្នើសុំដែលបានរៀបចំដោយក្រុមហ៊ុនធានាទិញមូលបត្រ។
                        <span class="text-primary font-sm">
                            Application must be made on the application form that
                            has been prepared by the
                            Underwriter.
                        </span>
                    </p>
                </li>
                <li>
                    <p class="font-sm">
                        ពាក្យស្នើសុំត្រូវធ្វើឡើងដោយ រូបវន្តបុគ្គល
                        ឬនីតិបុគ្គលដែលបានចុះបញ្ជី
                        និងមិនត្រូវធ្វើក្នុងនាមអនីតិជន
                        ឬបុគ្គលដែលមានសតិមិនគ្រប់គ្រាន់ទេ។
                        <span class="text-primary font-sm">
                            Application must be made by existing individuals or
                            registered legal entities and not in
                            the
                            name of minors or persons of unsound mind.
                        </span>
                    </p>
                </li>
                <li>
                    <p class="font-sm">
                        ពាក្យស្នើសុំត្រូវបំពេញឲ្យបានពេញលេញ
                        និងគោរពតាមលក្ខខណ្ឌតម្រូវដែលមាន។
                        <span class="text-primary font-sm">
                            Application must be complete and satisfy the
                            requirements contained herein.
                        </span>
                    </p>
                </li>
                <li>
                    <p class="font-sm">
                        វិនិយោគិនត្រូវផ្តល់នូវ (១) លេខអត្ដសញ្ញាណវិនិយោគិនចេញដោយ
                        ន.ម.ក (២)
                        ព័ត៌មានលម្អិតអំពីគណនីជួញដូរមូលបត្រដែលមាននៅក្រុមហ៊ុនមូលបត្រណាមួយដែលទទួលអាជ្ញាប័ណ្ណពី
                        ន.ម.ក.
                        (៣)
                        ព័ត៌មានលម្អិតអំពីគណនីធនាគារសម្រាប់ការផ្ទេរប្រាក់ត្រឡប់ទៅវិញ
                        (ប្រសិនបើមាន) និង (៤)
                        ឯកសារផ្សេងទៀតដែលស្នើសុំដោយក្រុមហ៊ុនធានាទិញមូលបត្រ
                        ឬតំណាងភ្នាក់ងារលក់នៅពេលដាក់ពាក្យស្នើសុំ
                        ឬនៅពេលក្រោយ ដែលព័ត៌មានក្នុងចំណុច (១) និង (២)
                        អាចផ្តល់ឲ្យបានមុននឹងធ្វើការជួញដូរលើ ផ.ម.ក.។
                        <span class="text-primary font-sm">
                            An investor should provide its (1) Investor
                            Identification Number issued by the SERC,
                            (2)
                            details of the trading account at one of the securities
                            firms licensed by the SERC, (3)
                            details of a bank account for the purpose of receiving
                            the refund (if any), and (4) any
                            other documents requested by Underwriter or any one of
                            its authorized selling agents,
                            either
                            at the time of submitting the application or at a later
                            date provided that the
                            information
                            noted under (1) and (2) are made available prior to
                            trading on the CSX.
                        </span>
                    </p>
                </li>
                <li>
                    <p class="font-sm">
                        ពាក្យស្នើសុំដែលមានព័ត៌មានមិនពិត ឬមិនត្រឹមត្រូវ
                        នឹងត្រូវបានបដិសេធចោល
                        វិនិយោគិនអាចនឹងត្រូវផ្តន្ទាទោសតាមច្បាប់ ដែលក្នុងករណីនេះ
                        ក្រុមហ៊ុនធានាទិញមូលបត្រ
                        មិនទទួលខុសត្រូវឡើយ។
                        <span class="text-primary font-sm">
                            Application containing false statements or incorrect
                            information may be rejected and the
                            relevant investor may be subjected to legal allegation
                            under the law for which the
                            Underwriter assumes no responsibility for such action.
                        </span>
                    </p>
                </li>
                <li>
                    <p class="font-sm">
                        វិនិយោគិនម្នាក់មិនអាចដាក់ពាក្យស្នើសុំលើសពីមួយដងទេ
                        ហើយក្រុមហ៊ុនធានាទិញមូលបត្រ
                        សូមរក្សាសិទ្ធិបដិសេធពាក្យស្នើសុំដែលដាក់ច្រើនដង
                        ឬពាក្យស្នើសុំដែលសង្ស័យថាត្រូវបានដាក់ច្រើនដង។
                        <span class="text-primary font-sm">
                            An investor cannot submit more than one application and
                            the Underwriter reserve the
                            right to
                            reject all multiple applications or suspected multiple
                            applications.
                        </span>
                    </p>
                </li>
                <li>
                    <p class="font-sm">
                        នៅពេលដាក់ពាក្យស្នើសុំតាមរយៈអ្នកតំណាង
                        ពាក្យស្នើសុំត្រូវតែភ្ជាប់ជាមួយនូវលិខិតប្រគល់សិទ្ធិត្រឹមត្រូវដែលមានសុពលភាព។
                        <span class="text-primary font-sm">
                            When applying through a representative or a proxy, the
                            application must be accompanied
                            by a
                            valid authorization or proxy letter.
                        </span>
                    </p>
                </li>
                <li>
                    <p class="font-sm">
                        លើកលែងមានការបញ្ជាក់ផ្សេងពីនេះ
                        ពាក្យកាត់នៅក្នុងពាក្យស្នើសុំនេះ
                        ត្រូវមានន័យដូចដែលមានចែងក្នុងឯកសារផ្តល់ព័ត៌មានរបស់ក្រុមហ៊ុនបោះផ្សាយ
                        ដែលបានចុះបញ្ជី
                        និងទទួលបានការអនុញ្ញាតនៅ ន.ម.ក។
                        <span class="text-primary font-sm">
                            Unless stated otherwise, all capitalized terms herein
                            shall have the meaning stipulated
                            or
                            referred to in the Issuer’s Disclosure Document that has
                            been registered and approved
                            the
                            SERC.
                        </span>
                    </p>
                </li>
            </ol>
        </li>
        <li>
            <p class="font-sm bg-primary px-1">
                ការធ្វើបរិវិសកម្ម
                <span class="text-primary font-sm">
                    / SUBSCRIPTION
                </span>
            </p>
            <ol>
                <li>
                    <p class="font-sm">
                        វិនិយោគិនត្រូវធ្វើបរិវិសកម្មមិនតិចជាង [ ៨៧៨ ]
                        ឯកតាភាគហ៊ុនបោះផ្សាយលក់។
                        <span class="text-primary font-sm">
                            Investors must subscribe no less than[ 878 ] Offer
                            Shares.
                        </span>
                    </p>
                </li>
                <li>
                    <p class="font-sm">
                        ការដាក់តម្កល់ប្រាក់សម្រាប់ការធ្វើបរិវិសកម្ម
                        ("ប្រាក់តម្កល់បរិវិសកម្ម") ត្រូវមានចំនួន ១០០%
                        នៃថ្លៃភាគហ៊ុនបោះផ្សាយលក់សរុប
                        ដែលបានធ្វើបរិវិសកម្មក្នុងពាក្យស្នើសុំ។
                        ទឹកប្រាក់ដែលដាក់តម្កល់
                        នឹងមិនមានការប្រាក់ទេ លើកលែងតែមានការបញ្ជាក់ច្បាស់លាស់ពី
                        ន.ម.ក។
                        <span class="text-primary font-sm">
                            Deposit for the subscription (the “Subscription
                            Deposit”) shall be 100% of the total
                            value
                            of the amount of Offer Shares that have been subscribed
                            in the application, and no
                            interest
                            shall accrue on the Subscription Deposit unless
                            expressly instructed otherwise by the
                            SERC.
                        </span>
                    </p>
                </li>
                <li>
                    <p class="font-sm">
                        អត្រាប្តូរប្រាក់៖ វិនិយោគិន
                        អាចតម្កល់ប្រាក់សម្រាប់ការធ្វើបរិវិសកម្មជាប្រាក់រៀល
                        ឬដុល្លារអាមេរិក។
                        ប្រសិនបើវិនិយោគិនតម្កល់ប្រាក់ដុល្លារអាមេរិក
                        វិនិយោគិនយល់ព្រមឲ្យក្រុមហ៊ុនបោះផ្សាយ​កំណត់អត្រាប្តូរប្រាក់ [
                        _____ ] រៀល = ១ ដុល្លារអាមេរិក
                        ដោយយោងតាមអត្រាប្តូរប្រាក់ជាផ្លូវការរបស់ធនាគារជាតិនៃកម្ពុជា
                        ប្រាំថ្ងៃនៃថ្ងៃធ្វើការមុនថ្ងៃធ្វើបរិវិសកម្ម
                        ដើម្បីគណនាចំនួនប្រាក់កក់សម្រាប់ការធ្វើបរិវិសកម្ម។
                        <span class="text-primary font-sm">
                            Exchange Rate: Investor can pay the subscription deposit
                            either by either United States
                            Dollar (“USD”) or Khmer Riel (“KHR”). If the investor
                            pays such deposit in USD, then the
                            investor agrees that Issuer has fixed at KHR [ _____ ] =
                            USD 1, based on the official
                            exchange rate of National Bank of Cambodia five (5)
                            working days prior to initial date
                            of
                            Subscription, to determine the subscription deposit
                            amount.
                        </span>
                    </p>
                </li>
                <li>
                    <p class="font-sm">
                        ក្នុងករណីមានភាពខុសគ្នា រវាងចំនួនមូលបត្រកម្មសិទ្ធិសរុប
                        ដែលបានធ្វើបរិវិសកម្ម
                        និងចំនួនមូលបត្រកម្មសិទ្ធិដែលអាចធ្វើបរិវិសកម្មបានជាមួយនឹងប្រាក់តម្កល់
                        បរិវិសកម្ម
                        វិនិយោគិនត្រូវសន្មតថាបានធ្វើបរិវិសកម្មលើចំនួនទឹកប្រាក់តម្កល់ធ្វើបរិវិសកម្ម។
                        <span class="text-primary font-sm">
                            In the event of any discrepancy between the subscribed
                            amount and the amount that can be
                            subscribed with the Subscription Deposit, the Investor
                            shall be deemed to have
                            subscribed
                            for the amount corresponding to the Subscription
                            Deposit.
                        </span>
                    </p>
                </li>
                <li>
                    <p class="font-sm">
                        ប្រាក់តម្កល់បរិវិសកម្ម
                        ត្រូវផ្ទេរឲ្យបានគ្រប់ចំនួនតាមការណែនាំរបស់ក្រុមហ៊ុនធានាទិញមូលបត្រ។​
                        ក្រុមហ៊ុនធានាទិញមូលបត្រ មិនទទួលខុសត្រូវលើការភាន់ច្រឡំ
                        ឬយឺតយ៉ាវណាមួយ
                        ដែលកើតឡើងក្នុងអំឡុងពេលផ្ទេរប្រាក់
                        ដែលបណ្តាលមកពីការមិនគោរពតាមការណែនាំខាងលើ។
                        <span class="text-primary font-sm">
                            The Subscription Deposit must be transferred or remitted
                            in full in accordance with the
                            Underwriter’s instructions. The Underwriter assumes or
                            undertakes no responsibility for
                            any
                            error or delay in the transfer or remittance as a result
                            of a failure to follow the
                            aforementioned instructions.
                        </span>
                    </p>
                </li>
                <li>
                    <p class="font-sm">
                        ការធ្វើបរិវិសកម្មលើភាគហ៊ុនបោះផ្សាយលក់ដែលលៃបម្រុងទុកសម្រាប់វិនិយោគិនសក្តានុពល
                        ត្រូវកំណត់តាមវិធាន
                        និងបទបញ្ជារបស់ក្រុមហ៊ុនបោះផ្សាយ និងក្រុមហ៊ុនធានាទិញមូលបត្រ។
                        <span class="text-primary font-sm">
                            Subscription pursuant to Offer Shares reserved for
                            potential investors shall be
                            regulated in
                            accordance with rules and regulations stipulated by the
                            Issuer and Underwriter.
                        </span>
                    </p>
                </li>
                <li>
                    <p class="font-sm">
                        ការធ្វើបរិវិសកម្មលើមូលបត្រកម្មសិទ្ធិ
                        ដែលលៃបម្រុងទុកសម្រាប់លក់ឲ្យបុគ្គលិករបស់ក្រុមហ៊ុនបោះផ្សាយ
                        ត្រូវកំណត់តាមវិធានផ្ទៃក្នុងរបស់ក្រុមហ៊ុនបោះផ្សាយ។
                        <span class="text-primary font-sm">
                            Subscription pursuant to the Issuer’s ESOP shall be
                            regulated in accordance with the
                            Issuer’s internal rules.
                        </span>
                    </p>
                </li>
            </ol>
        </li>
        <li>
            <p class="font-sm bg-primary px-1">
                ការបែងចែកមូលបត្រកម្មសិទ្ធិ
                <span class="text-primary font-sm">
                    / ALLOTMENT
                </span>
            </p>
            <ol>
                <li>
                    <p class="font-sm">
                        ក្នុងករណី
                        ចំនួនភាគហ៊ុនដែលបានបម្រុងសម្រាប់ការធ្វើបរិវិសកម្មរបស់ក្រុមវិនិយោគិនណាមួយមិនបានធ្វើបរិវិសកម្មអស់
                        នោះ
                        ចំនួនភាគហ៊ុនដែលនៅសល់នឹងត្រូវបែងចែកទៅឲ្យក្រុមវិនិយោគិនផ្សេងទៀត
                        ដែលធ្វើបរិវិសកម្មលើសពីចំនួនភាគហ៊ុនដែលបានបម្រុងទុក។
                        <span class="text-primary font-sm">
                            In the event that the reserved shares of a particular
                            investor group are not fully
                            covered
                            by actual subscription, the residual unsubscribed shares
                            shall be re-allotted to another
                            investor group with excess subscription.
                        </span>
                    </p>
                </li>
                <li>
                    <p class="font-sm">
                        គោលការណ៍បែងចែកភាគហ៊ុនទៅឲ្យភាគហ៊ុនកាន់កាប់តិចជាង ១%
                        ត្រូវបានអនុវត្ត។
                        <span class="text-primary font-sm">
                            1% Rule is applied.
                        </span>
                    </p>
                </li>
            </ol>
        </li>
        <li>
            <p class="font-sm bg-primary px-1">
                ការផ្ទេរប្រាក់
                <span class="text-primary font-sm">
                    / REFUND
                </span>
            </p>
            <ol>
                <li>
                    <p class="font-sm">
                        ប្រាក់តម្កល់បរិវិសកម្មដែលលើសពីចំនួនទឹកប្រាក់ដែលបានទិញភាគហ៊ុនបោះផ្សាយលក់ជាក់ស្តែង
                        បន្ទាប់ពីដំណាក់កាលបរិវិសកម្ម ត្រូវផ្ទេរត្រឡប់ទៅ វិនិយោគិនវិញ
                        តាមរយៈការផ្ទេរតាមធនាគារ
                        ដែលបានបញ្ជាក់ក្នុងពាក្យស្នើសុំ ឬតាមវិធីដែលសមស្របផ្សេងទៀត។
                        ការផ្ទេរប្រាក់
                        ត្រូវគិតតាមថ្លៃលក់មូលបត្រស្មើនឹង [ ២.២៧០ ] រៀល ឬ​​ [ ០,៥៧ ]
                        ដុល្លារអាមេរិក។
                        <span class="text-primary font-sm">
                            Any amount of the Subscription Deposit which exceeds the
                            amount of Offer Shares acquired
                            after the subscription period shall be refunded to the
                            corresponding investors through a
                            bank transfer to their respective bank accounts as
                            mentioned in their application or via
                            any
                            other reasonable methods. A refund shall be calculated
                            based on the offer price of KHR
                            [2,270] or USD [ 0.57 ].
                        </span>
                    </p>
                </li>
                <li>
                    <p class="font-sm">
                        រូបិយប័ណ្ណនៃការផ្ទេរប្រាក់កក់៖ វិនិយោគិនយល់ព្រមថា
                        រូបិយប័ណ្ណនៃការផ្ទេរប្រាក់កក់
                        ត្រូវដូចគ្នាទៅនឹងរូបិយប័ណ្ណ
                        ដែលបានតម្កល់ក្នុងពេលធ្វើបរិវិសកម្ម។
                        <span class="text-primary font-sm">
                            Refund Currency: Investor agrees that the refund
                            currency shall be the same currency
                            with
                            the subscription deposit.
                        </span>
                    </p>
                </li>
                <li>
                    <p class="font-sm">
                        ក្រុមហ៊ុនធានាទិញមូលបត្រ និង/ឬក្រុមហ៊ុនបោះផ្សាយ
                        មិនទទួលខុសត្រូវលើការភាន់ច្រឡំណាមួយ
                        ដែលកើតឡើងក្នុងអំឡុងពេលផ្ទេរប្រាក់ត្រឡប់ទៅវិញ ដែល
                        បណ្តាលមកពីព័ត៌មានគណនីធនាគារនៅក្នុងពាក្យស្នើសុំមិនត្រឹមត្រូវ។
                        <span class="text-primary font-sm">
                            Underwriters and/or the Issuer assumes or undertakes no
                            responsibility for any error in
                            the
                            refund due to inaccurate bank account details in the
                            application.
                        </span>
                    </p>
                </li>
                <li>
                    <p class="font-sm">
                        រាល់ការចំណាយ និងកម្រៃណាមួយដោយផ្នែក
                        ឬទាំងអស់ដែលពាក់ព័ន្ធនឹងការផ្ទេរត្រឡប់ទៅវិញ
                        រួមទាំងការចំណាយ
                        និងកម្រៃសេវាលើការផ្ទេរតាមធនាគារត្រូវជាបន្ទុករបស់វិនិយោគិន។​
                        <span class="text-primary font-sm">
                            Any and all expenses, fees and charges related to the
                            refund including, without
                            limitation,
                            the bank transfer fee and service charge, shall be borne
                            by the investor.
                        </span>
                    </p>
                </li>
            </ol>
        </li>
        <li>
            <p class="font-sm bg-primary px-1">
                អំណាចនៃត្រារបស់ ក្រុមហ៊ុនធានាទិញមូលបត្រ
                និងទម្រង់ហត្ថលេខារបស់ភ្នាក់ងាររបស់ក្រុមហ៊ុនធានាទិញមូលបត្រ
                <span class="text-primary font-sm">
                    /Power of seal of the Underwriter and Signature image of the
                    Underwriter or the Underwriter’s
                    Securities Representative.
                </span>
            </p>
            <ol>
                <li>
                    <p class="font-sm">
                        ត្រារបស់ក្រុមហ៊ុនធានាទិញមូលបត្រ
                        និងទម្រង់ហត្ថលេខារបស់ភ្នាក់ងារក្រុមហ៊ុនធានាទិញមូលបត្រ
                        ដែលមាននៅលើពាក្យស្នើសុំធ្វើបរិវិសកម្មមូលបត្រកម្មសិទ្ធិ
                        និងវិក្ក័យបត្របរិវិសកម្មមូលបត្រ
                        ត្រូវចាត់ទុកដូចជាត្រាដើមរបស់ ក្រុមហ៊ុនធានាទិញមូលបត្រ
                        និងហត្ថលេខាដើមរបស់ភ្នាក់ងារក្រុមហ៊ុនធានាទិញមូលបត្រ
                        និងមានឥទិ្ធពលតាមផ្លូវច្បាប់ដូចត្រាដើម
                        និងហត្ថលេខាដើម។ តាមការស្នើសុំរបស់វិនិយោគិន
                        ក្រុមហ៊ុនធានាទិញមូលបត្រ
                        ត្រូវប្រគល់ឲ្យវិនិយោគិននូវពាក្យស្នើសុំធ្វើបរិវិសកម្មមូលបត្រកម្មសិទ្ធិ
                        និង/ឬ
                        វិក្ក័យបត្របរិវិសកម្មមូលបត្រ ។
                        <span class="text-primary font-sm">
                            The seal of either the Underwriter as affixed hereto by
                            the Underwriters and the
                            signature
                            image of either the Underwriters or the Underwriter’s
                            Securities Representatives as
                            affixed
                            on the Application Form to subscribe IPO shares and
                            Receipt for Subscription shall be
                            deemed
                            as the originals of the seal of either the Underwriters
                            and the original signatures of
                            either the Underwriters or the Underwriter’s Securities
                            Representatives respectively,
                            and be
                            construed as having the same legal effect as to the
                            original thereof. Upon request from
                            the
                            Investor, either the Underwriter shall provide such
                            Investor with either of the
                            Application
                            Form to subscribe IPO shares and/or Receipt
                        </span>
                    </p>
                </li>
            </ol>
        </li>
        <li>
            <p class="font-sm bg-primary px-1">
                ផ្សេងៗ
                <span class="text-primary font-sm">
                    / MISCELLANEOUS
                </span>
            </p>
            <ol>
                <li>
                    <p class="font-sm">
                        លទ្ធផលបរិវិសកម្ម នឹងត្រូវប្រកាសជូនសាធារណៈ
                        តាមរយៈសារព័ត៌មានដែលបានការទទួលស្គាល់
                        និងគេហទំព័រផ្លូវការរបស់ក្រុមហ៊ុនធានាទិញមូលបត្រ
                        ក្រុមហ៊ុនបោះផ្សាយ ន.ម.ក
                        និង/ឬតំណាងភ្នាក់ងារលក់។
                        <span class="text-primary font-sm">
                            Subscription result shall be announced to the public via
                            accredited newspapers and the
                            official websites of the Underwriter, the Issuer, the
                            SERC and/or the Issuer's
                            authorized
                            selling agents.
                        </span>
                    </p>
                </li>
                <li>
                    <p class="font-sm">
                        វិនិយោគិនដែលមានសំណួរពាក់ព័ន្ធនឹងពាក្យស្នើសុំនេះ
                        គួរស្វែងរកនូវការបញ្ជាក់ពីក្រុមហ៊ុនធានាទិញមូលបត្រ
                        ឬតំណាងភ្នាក់ងារលក់។
                        <span class="text-primary font-sm">
                            An investor with queries regarding the application or
                            any of the matters contained
                            herein
                            should seek clarification from Underwriters or the
                            Issuer's authorized selling agents.
                        </span>
                    </p>
                </li>
            </ol>
        </li>
    </ol>

</body>

</html>