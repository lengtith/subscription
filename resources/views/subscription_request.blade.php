@extends('layouts.master')

@section('content')
<div id="main-wrapper" class="mt-5">
    <div class="row justify-content-center">
        <div class="col-xl-8 p-0">
            <form action="">
                            <div class="d-flex flex-column gap-4">
                                <div class="p-0">
                                    <h3 class="h4 font-weight-bold text-theme">Subscription Request</h3>
                                </div>
                                <hr class="line">
                                <div class="card p-0">
                                    <div class="card-header text-uppercase">
                                        General Information
                                        <br>
                                        <span>ពត៌មានទូទៅ</span>
                                    </div>
                                    <div class="card-body row d-flex gap-3">
                                        <div class="row justify-content-between text-left ">
                                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                                <label class="form-control-label">
                                                    Khmer Name
                                                    <span class="text-danger"> *</span>
                                                    <br>
                                                    <span>ឈ្មោះជាភាសារខ្មែរ</span>
                                                </label>
                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your first name" onblur="validate(1)">
                                            </div>
                                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                                <label class="form-control-label">
                                                    Latin Name
                                                    <span class="text-danger"> *</span>
                                                    <br>
                                                    <span>ឈ្មោះជាភាសាឡាតាំង</span>
                                                </label>
                                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your last name" onblur="validate(2)">
                                            </div>
                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                                <label class="form-control-label">
                                                    Email Address
                                                    <span class="text-danger"> *</span>
                                                    <br>
                                                    <span>អាសយដ្ឋានអ៊ីម៉េល</span>
                                                </label>
                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your first name" onblur="validate(1)">
                                            </div>
                                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                                <label class="form-control-label">
                                                    Date of Birth
                                                    <span class="text-danger"> *</span>
                                                    <br>
                                                    <span>ថ្ងៃខែឆ្នាំកំណើត</span>
                                                </label>
                                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your last name" onblur="validate(2)">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card p-0">
                                    <div class="card-header text-uppercase">
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
                                                        <input class="form-check-input" type="radio" name="investorType" id="1" value="option1">
                                                        <label class="form-check-label" for="1">Individual</label>
                                                        <br>
                                                        <span>វិនិយោគិនជារូបវន្តបុគ្គល</span>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="investorType" id="2" value="option2">
                                                        <label class="form-check-label" for="2">Legal Entity</label>
                                                        <br>
                                                        <span>វិនិយោគិនជារូបវន្តបុគ្គល</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                                <label class="form-control-label">
                                                    Trading Name (Khmer)
                                                    <span class="text-danger"> *</span>
                                                    <br>
                                                    <span>អាសយដ្ឋានអ៊ីម៉េល</span>
                                                </label>
                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your first name" onblur="validate(1)">
                                            </div>
                                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                                <label class="form-control-label">
                                                    Trading Name (English)
                                                    <span class="text-danger"> *</span>
                                                    <br>
                                                    <span>ថ្ងៃខែឆ្នាំកំណើត</span>
                                                </label>
                                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your last name" onblur="validate(2)">
                                            </div>
                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                                <label class="form-control-label">
                                                    Investor ID No
                                                    <span class="text-danger"> *</span>
                                                    <br>
                                                    <span>អាសយដ្ឋានអ៊ីម៉េល</span>
                                                </label>
                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your first name" onblur="validate(1)">
                                            </div>
                                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                                <label class="form-control-label">
                                                    Trading Account No.
                                                    <span class="text-danger"> *</span>
                                                    <br>
                                                    <span>ថ្ងៃខែឆ្នាំកំណើត</span>
                                                </label>
                                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your last name" onblur="validate(2)">
                                            </div>
                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col flex-column d-flex gap-1">
                                                <label class="form-control-label">
                                                    Trading Account with Securities Firm
                                                    <span class="text-danger"> *</span>
                                                    <br>
                                                    <span>អាសយដ្ឋានអ៊ីម៉េល</span>
                                                </label>
                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your first name" onblur="validate(1)">
                                            </div>
                                        </div>
                                        <div class="row justify-content-between text-left">
                                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                                <label class="form-control-label">
                                                    Contact
                                                    <span class="text-danger"> *</span>
                                                    <br>
                                                    <span>អាសយដ្ឋានអ៊ីម៉េល</span>
                                                </label>
                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your first name" onblur="validate(1)">
                                            </div>
                                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                                <label class="form-control-label">
                                                    Email
                                                    <span class="text-danger"> *</span>
                                                    <br>
                                                    <span>ថ្ងៃខែឆ្នាំកំណើត</span>
                                                </label>
                                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your last name" onblur="validate(2)">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card p-0">
                                    <div class="card-header text-uppercase">
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
                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your first name" onblur="validate(1)">
                                            </div>
                                            <div class="form-group col flex-column d-flex gap-1">
                                                <label class="form-control-label">
                                                    Investor’s Signature Attachment
                                                    <span class="text-danger"> *</span>
                                                    <br>
                                                    <span>ឈ្មោះជាភាសាឡាតាំង</span>
                                                </label>
                                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your last name" onblur="validate(2)">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card p-0">
                                    <div class="card-header text-uppercase">
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
                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your first name" onblur="validate(1)">
                                            </div>
                                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                                <label class="form-control-label">
                                                    Account Name for Deposit (KHR)
                                                    <span class="text-danger"> *</span>
                                                    <br>
                                                    <span>ឈ្មោះជាភាសាឡាតាំង</span>
                                                </label>
                                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your last name" onblur="validate(2)">
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
                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your first name" onblur="validate(1)">
                                            </div>
                                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                                <label class="form-control-label">
                                                    Account Name for Deposit (USD)
                                                    <span class="text-danger"> *</span>
                                                    <br>
                                                    <span>ឈ្មោះជាភាសាឡាតាំង</span>
                                                </label>
                                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your last name" onblur="validate(2)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card p-0">
                                    <div class="card-header text-uppercase">
                                        Payment Information
                                        <br>
                                        <span>ពត៌មានទូទៅ</span>
                                    </div>
                                    <div class="card-body row d-flex gap-3">
                                        <div class="row justify-content-between text-left ">
                                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                                <label class="form-control-label">
                                                    Currency
                                                    <span class="text-danger"> *</span>
                                                    <br>
                                                    <span>ប្រភេទវិនិយោគិន</span>
                                                </label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="investorType" id="1" value="option1">
                                                    <label class="form-check-label" for="1">KHR</label>
                                                    <br>
                                                    <span>វិនិយោគិនជារូបវន្តបុគ្គល</span>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="investorType" id="2" value="option2">
                                                    <label class="form-check-label" for="2">USD</label>
                                                    <br>
                                                    <span>វិនិយោគិនជារូបវន្តបុគ្គល</span>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6 flex-column d-flex gap-1">
                                                <label class="form-control-label">
                                                    Price per Offer Share
                                                    <span class="text-danger"> *</span>
                                                    <br>
                                                    <span>ឈ្មោះជាភាសារខ្មែរ</span>
                                                </label>
                                                <input disabled type="text" class="form-control" id="fname" name="fname" placeholder="Enter your first name" onblur="validate(1)">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column gap-3">
                                            <div class="form-group col">
                                                <label class="form-control-label">
                                                    Total number of Offer Shares for subscription
                                                    <span class="text-danger"> *</span>
                                                    <br>
                                                    <span>ឈ្មោះជាភាសារខ្មែរ</span>
                                                </label>
                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your first name" onblur="validate(1)">
                                            </div>
                                            <div class="form-group col">
                                                <label class="form-control-label">
                                                    Total value for subscription
                                                    <span class="text-danger"> *</span>
                                                    <br>
                                                    <span>ឈ្មោះជាភាសាឡាតាំង</span>
                                                </label>
                                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your last name" onblur="validate(2)">
                                            </div>
                                            <div class="form-group col">
                                                <label class="form-control-label">
                                                    Actual deposit in subscription
                                                    <span class="text-danger"> *</span>
                                                    <br>
                                                    <span>ឈ្មោះជាភាសាឡាតាំង</span>
                                                </label>
                                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your last name" onblur="validate(2)">
                                            </div>
                                        </div>
                                        <div class="row justify-content-between text-left ">
                                            <div class="form-group col flex-column d-flex gap-1">
                                                <label class="form-control-label">
                                                    Payment Methods
                                                    <span class="text-danger"> *</span>
                                                    <br>
                                                    <span>ប្រភេទវិនិយោគិន</span>
                                                </label>
                                                <div class="d-flex flex-column gap-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="investorType" id="1" value="option1">
                                                        <label class="form-check-label" for="1">Deposit Slip</label>
                                                        <br>
                                                        <span>វិនិយោគិនជារូបវន្តបុគ្គល</span>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="investorType" id="2" value="option2">
                                                        <label class="form-check-label" for="2">Bank transfer reference</label>
                                                        <br>
                                                        <span>វិនិយោគិនជារូបវន្តបុគ្គល</span>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="investorType" id="2" value="option2">
                                                        <label class="form-check-label" for="2">Cheque No.</label>
                                                        <br>
                                                        <span>វិនិយោគិនជារូបវន្តបុគ្គល</span>
                                                    </div>
                                                    <input type="file" class="form-control" id="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-between text-left ">
                                            <div class="form-group col flex-column d-flex gap-1">
                                                <label class="form-control-label">
                                                    Refund Information
                                                    <span class="text-danger"> *</span>
                                                    <br>
                                                    <span>ប្រភេទវិនិយោគិន</span>
                                                </label>
                                                <div class="d-flex flex-column gap-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="investorType" id="1" value="option1">
                                                        <label class="form-check-label" for="1">Refund to the above trading account</label>
                                                        <br>
                                                        <span>វិនិយោគិនជារូបវន្តបុគ្គល</span>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="investorType" id="2" value="option2">
                                                        <label class="form-check-label" for="2">Refund by cash at the deposit bank</label>
                                                        <br>
                                                        <span>វិនិយោគិនជារូបវន្តបុគ្គល</span>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="investorType" id="2" value="option2">
                                                        <label class="form-check-label" for="2">Refund to an bank account</label>
                                                        <br>
                                                        <span>វិនិយោគិនជារូបវន្តបុគ្គល</span>
                                                    </div>
                                                    <input type="file" class="form-control" id="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            <!-- end card -->
            <button type="submit" class="btn btn-primary mb-3 mt-3">Submit</button>
            <button type="submit" class="btn btn-warning mb-3 mt-3 rounded-lg">Preview</button>
            <button type="submit" class="btn btn-light mb-3 mt-3 ">Cancel</button>
        </form>
            <!-- end row -->

        </div>
        <!-- end col -->
    </div>
    <!-- Row -->
</div>

<style>
    span{
        font-size: 14px;
        color: #444;
    }
    .account-block {
    padding: 0;
    background-image: url(https://bootdey.com/img/Content/bg1.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    height: 100%;
    position: relative;
    }
    .account-block .overlay {
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.4);
    }
    .account-block .account-testimonial {
        text-align: center;
        color: #fff;
        position: absolute;
        margin: 0 auto;
        padding: 0 1.75rem;
        bottom: 3rem;
        left: 0;
        right: 0;
    }

    .text-theme {
        color: #5369f8 !important;
    }

    .btn-theme {
        background-color: #5369f8;
        border-color: #5369f8;
        color: #fff;
    }
</style>
@endsection
