@extends('users.layouts.master')


@section('title')
    <title>Free Trail | Photo Design Expert</title>

@endsection

@section('content')

    <main id="main">

        <style>
            .clockdate-wrapper {
                background-color: #333;
                padding:5px;
                max-width:350px;
                width:100%;
                text-align:center;
                border-radius:15px;
                margin:0 auto;
            
            }
            #clock{
                background-color:#333;
                font-family: sans-serif;
                font-size:30px;
                text-shadow:0px 0px 1px #fff;
                color:#fff;
            }
            #clock span {
                color:#888;
                text-shadow:0px 0px 1px #333;
                font-size:20px;
                position:relative;
                top:-5px;
                left:10px;
            }
            #date {
                letter-spacing:3px;
                font-size:14px;
                font-family:arial,sans-serif;
                color:#fff;
            }
        </style>


        {{-- ===============================================================================================================
                                                                pricing
            ================================================================================================================ --}}

        <section id="pricing" class="pricing">
            <div class="container">

                <div class="py-5 text-center">
                    <h2>Free Trail Placement form</h2>
                    <p class="lead">Fill up the form below to place an free trail</p>
{{--                    <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter">Image Upload Tutorial</button>--}}
                    <button type="button" class="btn btn-warning video-btn" data-toggle="modal" data-src="https://www.youtube.com/embed/huMeYI9FMCQ" data-target="#tutorialModal">
                        Image Upload Tutorial
                    </button>
                </div>

                <div class="text-center pb-5">
                    <div class="clockdate-wrapper">
                        <div id="clock"></div>
                        <div id="date"></div>
                    </div>
                </div>
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="row">
                    <div class="col-md-8 order-md-1 mx-auto">
                        <form action="{{ route('freeTrailForm') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <span class="text-dark bg-transparent h4 font-weight-bold border-dark border-bottom infoTab">Your Information: </span>
                            <br>
                            <small class="text-muted infoTab">Please provide your informations.</small>
                            <div class="row mt-4 infoTab">
                                <div class="col-md-6 mb-3">
                                    <label for="quantity" class="font-weight-bold">Phone <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control inputPlaceholder" name="phone" id="quantity" placeholder="Your Phone ... "  value="@if(!Auth::user()->hasRole('admin')) {{ auth()->user()->phone }} @endif" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="quantity" class="font-weight-bold">Website <span>(Optional)</span></label>
                                    <input type="text" class="form-control inputPlaceholder" name="website" id="quantity" placeholder="Your Website ... "  value="@if(!Auth::user()->hasRole('admin')) {{ auth()->user()->company }} @endif">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="country" class="font-weight-bold">Country <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="country" id="" value="@if(!Auth::user()->hasRole('admin')) {{ auth()->user()->country }} @endif">
                                    <!-- <select class="custom-select d-block w-100 selectOption" name="country" id="country" required>
                                        <option value="" selected disabled hidden>Choose Your Country</option>
                                        <option value="Afganistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bonaire">Bonaire</option>
                                        <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                        <option value="Brunei">Brunei</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Canary Islands">Canary Islands</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Channel Islands">Channel Islands</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos Island">Cocos Island</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote DIvoire">Cote DIvoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Curaco">Curacao</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="East Timor">East Timor</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands">Falkland Islands</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Ter">French Southern Ter</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Great Britain">Great Britain</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Hawaii">Hawaii</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="India">India</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Isle of Man">Isle of Man</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea North">Korea North</option>
                                        <option value="Korea Sout">Korea South</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedonia">Macedonia</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Midway Islands">Midway Islands</option>
                                        <option value="Moldova">Moldova</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Nambia">Nambia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherland Antilles">Netherland Antilles</option>
                                        <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                        <option value="Nevis">Nevis</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau Island">Palau Island</option>
                                        <option value="Palestine">Palestine</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Phillipines">Philippines</option>
                                        <option value="Pitcairn Island">Pitcairn Island</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Republic of Montenegro">Republic of Montenegro</option>
                                        <option value="Republic of Serbia">Republic of Serbia</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="St Barthelemy">St Barthelemy</option>
                                        <option value="St Eustatius">St Eustatius</option>
                                        <option value="St Helena">St Helena</option>
                                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                        <option value="St Lucia">St Lucia</option>
                                        <option value="St Maarten">St Maarten</option>
                                        <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                        <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                        <option value="Saipan">Saipan</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="Samoa American">Samoa American</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Tahiti">Tahiti</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Erimates">United Arab Emirates</option>
                                        <option value="United States of America">United States of America</option>
                                        <option value="Uraguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Vatican City State">Vatican City State</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                        <option value="Wake Island">Wake Island</option>
                                        <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zaire">Zaire</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select> -->

                                    <div class="invalid-feedback">
                                        Please select a valid country.
                                    </div>
                                </div>
                            </div>
                            <!-- <hr class="mb-4"> -->

                            <span class="text-dark bg-transparent h4 font-weight-bold border-dark border-bottom">Service <sup class="text-danger">*</sup></span>
                            <br>
                            <small class="text-muted">Please select services that you wants.</small>
                            <div class="row mt-4">

                                <div class="col-md-4 mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="clipping" value="clipping" class="custom-control-input" id="service1">
                                        <label class="custom-control-label font-weight-bold" for="service1">Clipping
                                            Path</label>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="background" value="background" class="custom-control-input" id="service2">
                                        <label class="custom-control-label font-weight-bold" for="service2">Background
                                            Removal</label>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="masking" value="masking" class="custom-control-input" id="service3">
                                        <label class="custom-control-label font-weight-bold"
                                               for="service3">Masking</label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="retouch" value="retouch" class="custom-control-input" id="service4">
                                        <label class="custom-control-label font-weight-bold" for="service4">Photo
                                            Retouching</label>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="shadow" value="shadow" class="custom-control-input" id="service5">
                                        <label class="custom-control-label font-weight-bold"
                                               for="service5">Shadow</label>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="manipulation" value="manipulation" class="custom-control-input" id="service6">
                                        <label class="custom-control-label font-weight-bold" for="service6">Image
                                            Manipulation</label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="color" value="color" class="custom-control-input" id="service7">
                                        <label class="custom-control-label font-weight-bold" for="service7">Color
                                            Correction</label>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="vector" value="vector" class="custom-control-input" id="service8">
                                        <label class="custom-control-label font-weight-bold"
                                               for="service8">Vector</label>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="restoration" value="restoration" class="custom-control-input" id="service9">
                                        <label class="custom-control-label font-weight-bold" for="service9">Image
                                            Restoration</label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-12 mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" value="others" name="others" class="custom-control-input" id="service10">
                                        <label class="custom-control-label font-weight-bold" for="service10">Others
                                            (Please specify in insrtuction area at the bottom of the form)</label>
                                    </div>
                                </div>

                            </div>
                            <hr class="mb-4">

                            <span class="text-dark bg-transparent h4 font-weight-bold border-dark border-bottom">Preference: </span>
                            <br>
                            <small class="text-muted">Pleas select your preferences.</small>
                            <div class="row mt-4">
                                <div class="col-md-6 mb-3">
                                    <label for="country" class="font-weight-bold">Choose image format <span class="text-danger">*</span></label>
                                    <select class="custom-select d-block w-100 selectOption" id="image-format" name="image_format[]" multiple="multiple" required>
                                        {{-- <option value="" selected disabled hidden>Choose file format</option> --}}
                                        <option value=""></option>
                                        <option value="jpeg">JPEG/JPG</option>
                                        <option value="png">PNG</option>
                                        <option value="tiff">TIFF</option>
                                        <option value="psd">PSD</option>
                                        <option value="ai">AI</option>
                                        <option value="pdf">PDF</option>
                                        <option value="gif">GIF</option>
                                        <option value="dng">DNG</option>
                                        <option value="cr2">CR2</option>
                                        <option value="eps">EPS</option>
                                        <option value="null">Others( Specify in instruction area)</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="country" class="font-weight-bold">Background Option <span class="text-danger">*</span></label>

                                    <select class="custom-select d-block w-100 selectOption" id="image-bg" name="backgroundchoice[]" multiple="multiple" required>
                                        {{-- <option value="" selected disabled hidden>Choose Background Option</option> --}}
                                        <option>White</option>
                                        <option>Transparent</option>
                                        <option>Original</option>
                                        <option>None</option>
                                    </select>
                                </div>



                            </div>
                            <hr class="mb-4">

                            <span class="text-dark bg-transparent h4 font-weight-bold border-dark border-bottom">Upload Image:</span>
                            <br>
                            <small class="text-text-muted">Please upload your free trial images.</small>
                            <div class="row mt-4">
                                <div class="col-md-6 mb-3">
                                    <label for="quantity" class="font-weight-bold">Upload Image 1 <span class="text-danger">*</span></label>
                                    <div class="custom-file">
                                        <input type="file" name="image1" class="custom-file-input" id="customFile1" onchange="loadFile1(event)">
                                        <label class="custom-file-label labelCustom" for="customFile">Choose file</label>
                                    </div>
                                    <div class="w-100 mt-2">
                                        <img id="image1" class="img-thumbnail" />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="quantity" class="font-weight-bold">Upload Image 2 <span class="text-danger">*</span></label>
                                    <div class="custom-file">
                                        <input type="file" name="image2" class="custom-file-input" id="customFile2" onchange="loadFile2(event)">
                                        <label class="custom-file-label labelCustom" for="customFile">Choose file</label>
                                    </div>
                                    <div class="w-100 mt-2">
                                        <img id="image2" class="img-thumbnail" />
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">

                            <span class="text-dark bg-transparent h4 font-weight-bold border-dark border-bottom">Delivery Time</span>
                            <div class="row mt-4">
                                <div class="col-md-6 mb-3">
                                    <label for="country" class="font-weight-bold">Choose desired delivery time <span class="text-danger">*</span></label>
                                    <select class="custom-select d-block w-100 selectOption" name="delivery_time" id="country" required>
                                        <option value="" selected disabled hidden>Choose Delivery Time</option>
                                        <option value="6 hours">6 Hours</option>
                                        <option value="12 hours">12 Hours</option>
                                        <option value="24 hours">24 Hours</option>
                                        <option value="36 hours">36 Hours</option>
                                        <option value="48 hours">48 Hours</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="quantity" class="font-weight-bold">Do You Need Path?</label>
                                    <div class="form-check">
                                        <input class="form-check-input"  type="radio" name="pathRadios" id="gridRadios1" value="1" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pathRadios" id="gridRadios2" value="0">
                                        <label class="form-check-label" for="gridRadios2">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">

                            <span class="text-dark bg-transparent h4 font-weight-bold border-dark border-bottom">Instructions <sup class="text-danger">*</sup></span>
                            <div class="row mt-4">
                                <div class="col-md-12 mb-3">
                                    <label for="quantity" class="font-weight-bold">Please specify instructions</label>
                                    <textarea class="form-control" name="instruction" id="exampleFormControlTextarea1" rows="4" required></textarea>
                                </div>
                            </div>
                            <hr class="mb-4">

                            <button class="btn btn-warning btn-lg btn-block" type="submit">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </section>
{{--        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
{{--            <div class="modal-dialog" role="document">--}}
{{--                <div class="modal-content">--}}
{{--                    --}}{{--                <div class="modal-header">--}}

{{--                    --}}{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    --}}{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    --}}{{--                    </button>--}}
{{--                    --}}{{--                </div>--}}
{{--                    <div class="modal-body">--}}
{{--                        <iframe id="playerID" width="100%" height="100%"--}}
{{--                                src="https://www.youtube.com/embed/tgbNymZ7vqY">--}}
{{--                        </iframe>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    <!-- Modal -->
        <div class="modal fade" id="tutorialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" id="video-modal-dialog" role="document">
                <div class="modal-content">


                    <div class="modal-body" id="video-modal-body">

                        <button type="button" class="close" id="video-modal-close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <!-- 16:9 aspect ratio -->
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe width="1280" height="720" src="https://www.youtube.com/embed/huMeYI9FMCQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
{{--                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Jfrjeg26Cwk" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>--}}
                        </div>


                    </div>

                </div>
            </div>
        </div>







    </main>

@endsection
@section('scripts')
    <script>
        $('#playerID').get(0).stopVideo();
    </script>
    <script>
        var loadFile1 = function(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('image1');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        var loadFile2 = function(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('image2');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        @if(Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
        @elseif(Session::has('info'))
        toastr.info('{{ Session::get('info') }}');
        @elseif(Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('errors'))
        toastr.error('{!! implode('', $errors->all('<div>:message</div>')) !!}');
        @endif -->
    </script>
    <script>
        $(document).ready(function() {
            var $videoSrc;
            $('.video-btn').click(function() {
                $videoSrc = $(this).data( "src" );
            });
            console.log($videoSrc);
            $('#tutorailModal').on('shown.bs.modal', function (e) {

                $("#video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" );
            })
            $('#tutorialModal').on('hide.bs.modal', function (e) {
                // a poor man's stop video
                $("#video").attr('src',$videoSrc);
            })
        });


        $(document).ready(function() {
            $('#country').select2();
            $('#image-format').select2({
                placeholder: "Choose file formats",
            });
            $('#image-bg').select2({
                placeholder: "Choose background options",
            });
            startTime()
        });

        function startTime() {
            var today = new Date();
            var hr = today.getHours();
            var min = today.getMinutes();
            var sec = today.getSeconds();
            ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
            hr = (hr == 0) ? 12 : hr;
            hr = (hr > 12) ? hr - 12 : hr;
            //Add a zero in front of numbers<10
            hr = checkTime(hr);
            min = checkTime(min);
            sec = checkTime(sec);
            document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
            
            var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            var curWeekDay = days[today.getDay()];
            var curDay = today.getDate();
            var curMonth = months[today.getMonth()];
            var curYear = today.getFullYear();
            var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
            document.getElementById("date").innerHTML = date;
            
            var time = setTimeout(function(){ startTime() }, 500);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }


    </script>
@endsection
