<div class="register-box">
    <div class="register-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new membership</p>
            <form action="<?= base_url('auth/userRegistration') ?>" method="post" id="userRegistration">
                <!-- Name -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?= set_value('first_name'); ?>">
                            <?= form_error('first_name', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?= set_value('last_name'); ?>">
                            <?= form_error('last_name', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <!-- Gender -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group clearfix">
                            <div class="align-middle" style="display: inline-flex; margin-top: 3px;">
                                <label class="mr-3" style="min-height: 22px; margin-top:4px!important; margin-bottom: 4px!important;padding-left:0;">Gender: </label>
                                <div class="icheck-primary d-inline mr-1">
                                    <input type="radio" id="male" id="gender" name="gender" value="Male" checked="">
                                    <label for="male">
                                        Male
                                    </label>
                                </div>
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="female" id="gender" name="gender" value="Female">
                                    <label for="female">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Birth -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group date" id="date-birth" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#date-birth" name="birth" placeholder="Date of birth (yyyy-mm-dd)" value="<?= set_value('birth'); ?>" />
                                <div class="input-group-append" data-target="#date-birth" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            <?= form_error('birth', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Select Salutation -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <select class="form-control salutation" id="salutation" name="salutation">
                                    <option value="Prof. Dr." <?= set_select('salutation', 'Prof. Dr.', TRUE); ?>>Prof. Dr.</option>
                                    <option value="Prof. Dr. dr." <?= set_select('salutation', 'Prof. Dr. dr.'); ?>>Prof. Dr. dr.</option>
                                    <option value="Prof. Dr. drg." <?= set_select('salutation', 'Prof. Drg.'); ?>>Prof. Dr. drg.</option>
                                    <option value="Dr. dr." <?= set_select('salutation', 'Dr. dr.'); ?>>Prof.</option>
                                    <option value="Dr. dr" <?= set_select('salutation', 'Dr. dr'); ?>>Dr. dr.</option>
                                    <option value="Dr." <?= set_select('salutation', 'Dr.'); ?>>Dr.</option>
                                    <option value="dr." <?= set_select('salutation', 'dr.'); ?>>dr.</option>
                                    <option value="Mr." <?= set_select('salutation', 'Mr.'); ?>>Mr.</option>
                                    <option Value="Ms." <?= set_select('salutation', 'Ms.'); ?>>Ms.</option>
                                </select>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user-graduate"></span>
                                    </div>
                                </div>
                            </div>
                            <?= form_error('salutation', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <!-- Institution -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="institution" name="institution" placeholder="Institution" value="<?= set_value('institution'); ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-university"></span>
                                    </div>
                                </div>
                            </div>
                            <?= form_error('institution', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mt-1 mb-2">
                    <!-- Participation -->
                    <div class="col-auto col-md-auto">
                        <label>Participation:</label>
                    </div>
                    <div class="col col-md">
                        <div class="row">
                            <div class="col-md-auto mb-1">
                                <div class="icheck-primary d-inline mr-1">
                                    <input type="radio" id="participation1" name="participation" value="Presenter" checked="">
                                    <label for="presenter">
                                        Presenter
                                    </label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="icheck-primary d-inline mr-1">
                                    <input type="radio" id="participation2" name="participation" value="Non-Presenter">
                                    <label for="non-presenter">
                                        Non-Presenter
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Research -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="research" name="research" placeholder="Your research area or expertise" value="<?= set_value('research'); ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-search"></span>
                                    </div>
                                </div>
                            </div>
                            <?= form_error('research', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Email -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="email2" name="email2" placeholder="Confirm Email">
                            <?= form_error('email2', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Password -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password">
                            <?= form_error('password2', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <!-- Phone -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="<?= set_value('phone'); ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-mobile-alt"></span>
                                    </div>
                                </div>
                            </div>
                            <?= form_error('phone', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="fax" name="fax" placeholder="Fax Number" value="<?= set_value('fax'); ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-fax"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Address -->
                    <div class="col-md-3 postal-address">
                        <label>Postal Address: </label>
                    </div>
                    <div class="col-md col-sm-12">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="street" name="street" placeholder="Street" value="<?= set_value('street'); ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-road"></span>
                                    </div>
                                </div>
                            </div>
                            <?= form_error('street', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?= set_value('city'); ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-city"></span>
                                    </div>
                                </div>
                            </div>
                            <?= form_error('city', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Zip Code" value="<?= set_value('zip_code'); ?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-barcode"></span>
                                    </div>
                                </div>
                            </div>
                            <?= form_error('zip_code', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <select class="form-control countries" id="country" name="country">
                                    <option value="Kabul" data-capital="Kabul">Afghanistan</option>
                                    <option value="Mariehamn" data-capital="Mariehamn">Aland Islands</option>
                                    <option value="Albania" data-capital="Tirana">Albania</option>
                                    <option value="Algeria" data-capital="Algiers">Algeria</option>
                                    <option value="American Samoa" data-capital="Pago Pago">American Samoa</option>
                                    <option value="Andorra" data-capital="Andorra la Vella">Andorra</option>
                                    <option value="Angola" data-capital="Luanda">Angola</option>
                                    <option value="Anguilla" data-capital="The Valley">Anguilla</option>
                                    <option value="Antigua and Barbuda" data-capital="St. John's">Antigua and Barbuda</option>
                                    <option value="Argentina" data-capital="Buenos Aires">Argentina</option>
                                    <option value="Armenia" data-capital="Yerevan">Armenia</option>
                                    <option value="Aruba" data-capital="Oranjestad">Aruba</option>
                                    <option value="Australia" data-capital="Canberra">Australia</option>
                                    <option value="Austria" data-capital="Vienna">Austria</option>
                                    <option value="Azerbaijan" data-capital="Baku">Azerbaijan</option>
                                    <option value="Bahamas" data-capital="Nassau">Bahamas</option>
                                    <option value="Bahrain" data-capital="Manama">Bahrain</option>
                                    <option value="Bangladesh" data-capital="Dhaka">Bangladesh</option>
                                    <option value="Barbados" data-capital="Bridgetown">Barbados</option>
                                    <option value="Belarus" data-capital="Minsk">Belarus</option>
                                    <option value="Belgium" data-capital="Brussels">Belgium</option>
                                    <option value="Belize" data-capital="Belmopan">Belize</option>
                                    <option value="Benin" data-capital="Porto-Novo">Benin</option>
                                    <option value="Bermuda" data-capital="Hamilton">Bermuda</option>
                                    <option value="Bhutan" data-capital="Thimphu">Bhutan</option>
                                    <option value="Bolivia" data-capital="Sucre">Bolivia</option>
                                    <option value="Bonaire, Sint Eustatius and Saba" data-capital="Kralendijk">Bonaire, Sint Eustatius and Saba</option>
                                    <option value="Bosnia and Herzegovina" data-capital="Sarajevo">Bosnia and Herzegovina</option>
                                    <option value="Botswana" data-capital="Gaborone">Botswana</option>
                                    <option value="Brazil" data-capital="Brasília">Brazil</option>
                                    <option value="British Indian Ocean Territory" data-capital="Diego Garcia">British Indian Ocean Territory</option>
                                    <option value="Brunei Darussalam" data-capital="Bandar Seri Begawan">Brunei Darussalam</option>
                                    <option value="Bulgaria" data-capital="Sofia">Bulgaria</option>
                                    <option value="Burkina Faso" data-capital="Ouagadougou">Burkina Faso</option>
                                    <option value="Burundi" data-capital="Bujumbura">Burundi</option>
                                    <option value="Cabo Verde" data-capital="Praia">Cabo Verde</option>
                                    <option value="Cambodia" data-capital="Phnom Penh">Cambodia</option>
                                    <option value="Cameroon" data-capital="Yaoundé">Cameroon</option>
                                    <option value="Canada" data-capital="Ottawa">Canada</option>
                                    <option value="Cayman Islands" data-capital="George Town">Cayman Islands</option>
                                    <option value="Central African Republic" data-capital="Bangui">Central African Republic</option>
                                    <option value="Chad" data-capital="N'Djamena">Chad</option>
                                    <option value="Chile" data-capital="Santiago">Chile</option>
                                    <option value="China" data-capital="Beijing">China</option>
                                    <option value="Christmas Island" data-capital="Flying Fish Cove">Christmas Island</option>
                                    <option value="Cocos (Keeling) Islands" data-capital="West Island">Cocos (Keeling) Islands</option>
                                    <option value="Colombia" data-capital="Bogotá">Colombia</option>
                                    <option value="Comoros" data-capital="Moroni">Comoros</option>
                                    <option value="Cook Islands" data-capital="Avarua">Cook Islands</option>
                                    <option value="Costa Rica" data-capital="San José">Costa Rica</option>
                                    <option value="Croatia" data-capital="Zagreb">Croatia</option>
                                    <option value="Cuba" data-capital="Havana">Cuba</option>
                                    <option value="Curaçao" data-capital="Willemstad">Curaçao</option>
                                    <option value="Cyprus" data-capital="Nicosia">Cyprus</option>
                                    <option value="Czech Republic" data-capital="Prague">Czech Republic</option>
                                    <option value="Côte d'Ivoire" data-capital="Yamoussoukro">Côte d'Ivoire</option>
                                    <option value="Democratic Republic of the Congo" data-capital="Kinshasa">Democratic Republic of the Congo</option>
                                    <option value="Denmark" data-capital="Copenhagen">Denmark</option>
                                    <option value="Djibouti" data-capital="Djibouti">Djibouti</option>
                                    <option value="Dominica" data-capital="Roseau">Dominica</option>
                                    <option value="Dominican Republic" data-capital="Santo Domingo">Dominican Republic</option>
                                    <option value="Ecuador" data-capital="Quito">Ecuador</option>
                                    <option value="Egypt" data-capital="Cairo">Egypt</option>
                                    <option value="El Salvador" data-capital="San Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea" data-capital="Malabo">Equatorial Guinea</option>
                                    <option value="Eritrea" data-capital="Asmara">Eritrea</option>
                                    <option value="Estonia" data-capital="Tallinn">Estonia</option>
                                    <option value="Ethiopia" data-capital="Addis Ababa">Ethiopia</option>
                                    <option value="Falkland Islands" data-capital="Stanley">Falkland Islands</option>
                                    <option value="Faroe Islands" data-capital="Tórshavn">Faroe Islands</option>
                                    <option value="Federated States of Micronesia" data-capital="Palikir">Federated States of Micronesia</option>
                                    <option value="Fiji" data-capital="Suva">Fiji</option>
                                    <option value="Finland" data-capital="Helsinki">Finland</option>
                                    <option value="Former Yugoslav Republic of Macedonia" data-capital="Skopje">Former Yugoslav Republic of Macedonia</option>
                                    <option value="France" data-capital="Paris">France</option>
                                    <option value="French Guiana" data-capital="Cayenne">French Guiana</option>
                                    <option value="French Polynesia" data-capital="Papeete">French Polynesia</option>
                                    <option value="French Southern Territories" data-capital="Saint-Pierre, Réunion">French Southern Territories</option>
                                    <option value="Gabon" data-capital="Libreville">Gabon</option>
                                    <option value="Gambia" data-capital="Banjul">Gambia</option>
                                    <option value="Georgia" data-capital="Tbilisi">Georgia</option>
                                    <option value="Germany" data-capital="Berlin">Germany</option>
                                    <option value="Ghana" data-capital="Accra">Ghana</option>
                                    <option value="Gibraltar" data-capital="Gibraltar">Gibraltar</option>
                                    <option value="Greece" data-capital="Athens">Greece</option>
                                    <option value="Greenland" data-capital="Nuuk">Greenland</option>
                                    <option value="Grenada" data-capital="St. George's">Grenada</option>
                                    <option value="Guadeloupe" data-capital="Basse-Terre">Guadeloupe</option>
                                    <option value="Guam" data-capital="Hagåtña">Guam</option>
                                    <option value="Guatemala" data-capital="Guatemala City">Guatemala</option>
                                    <option value="Guernsey" data-capital="Saint Peter Port">Guernsey</option>
                                    <option value="Guinea" data-capital="Conakry">Guinea</option>
                                    <option value="Guinea-Bissau" data-capital="Bissau">Guinea-Bissau</option>
                                    <option value="Guyana" data-capital="Georgetown">Guyana</option>
                                    <option value="Haiti" data-capital="Port-au-Prince">Haiti</option>
                                    <option value="Holy See" data-capital="Vatican City">Holy See</option>
                                    <option value="Honduras" data-capital="Tegucigalpa">Honduras</option>
                                    <option value="Hong Kong" data-capital="Hong Kong">Hong Kong</option>
                                    <option value="Hungary" data-capital="Budapest">Hungary</option>
                                    <option value="Iceland" data-capital="Reykjavik">Iceland</option>
                                    <option value="India" data-capital="New Delhi">India</option>
                                    <option value="Indonesia" data-capital="Jakarta">Indonesia</option>
                                    <option value="Iran" data-capital="Tehran">Iran</option>
                                    <option value="Iraq" data-capital="Baghdad">Iraq</option>
                                    <option value="Ireland" data-capital="Dublin">Ireland</option>
                                    <option value="Isle of Man" data-capital="Douglas">Isle of Man</option>
                                    <option value="Israel" data-capital="Jerusalem">Israel</option>
                                    <option value="Italy" data-capital="Rome">Italy</option>
                                    <option value="Jamaica" data-capital="Kingston">Jamaica</option>
                                    <option value="Japan" data-capital="Tokyo">Japan</option>
                                    <option value="Jersey" data-capital="Saint Helier">Jersey</option>
                                    <option value="Jordan" data-capital="Amman">Jordan</option>
                                    <option value="Kazakhstan" data-capital="Astana">Kazakhstan</option>
                                    <option value="Kenya" data-capital="Nairobi">Kenya</option>
                                    <option value="Kiribati" data-capital="South Tarawa">Kiribati</option>
                                    <option value="Kuwait" data-capital="Kuwait City">Kuwait</option>
                                    <option value="Kyrgyzstan" data-capital="Bishkek">Kyrgyzstan</option>
                                    <option value="Laos" data-capital="Vientiane">Laos</option>
                                    <option value="Latvia" data-capital="Riga">Latvia</option>
                                    <option value="Lebanon" data-capital="Beirut">Lebanon</option>
                                    <option value="Lesotho" data-capital="Maseru">Lesotho</option>
                                    <option value="Liberia" data-capital="Monrovia">Liberia</option>
                                    <option value="Libya" data-capital="Tripoli">Libya</option>
                                    <option value="Liechtenstein" data-capital="Vaduz">Liechtenstein</option>
                                    <option value="Lithuania" data-capital="Vilnius">Lithuania</option>
                                    <option value="Luxembourg" data-capital="Luxembourg City">Luxembourg</option>
                                    <option value="Macau" data-capital="Macau">Macau</option>
                                    <option value="Madagascar" data-capital="Antananarivo">Madagascar</option>
                                    <option value="Malawi" data-capital="Lilongwe">Malawi</option>
                                    <option value="Malaysia" data-capital="Kuala Lumpur">Malaysia</option>
                                    <option value="Maldives" data-capital="Malé">Maldives</option>
                                    <option value="Mali" data-capital="Bamako">Mali</option>
                                    <option value="Malta" data-capital="Valletta">Malta</option>
                                    <option value="Marshall Islands" data-capital="Majuro">Marshall Islands</option>
                                    <option value="Martinique" data-capital="Fort-de-France">Martinique</option>
                                    <option value="Mauritania" data-capital="Nouakchott">Mauritania</option>
                                    <option value="Mauritius" data-capital="Port Louis">Mauritius</option>
                                    <option value="Mayotte" data-capital="Mamoudzou">Mayotte</option>
                                    <option value="Mexico" data-capital="Mexico City">Mexico</option>
                                    <option value="Moldova" data-capital="Chișinău">Moldova</option>
                                    <option value="Monaco" data-capital="Monaco">Monaco</option>
                                    <option value="Mongolia" data-capital="Ulaanbaatar">Mongolia</option>
                                    <option value="Montenegro" data-capital="Podgorica">Montenegro</option>
                                    <option value="Montserrat" data-capital="Little Bay, Brades, Plymouth">Montserrat</option>
                                    <option value="Morocco" data-capital="Rabat">Morocco</option>
                                    <option value="Mozambique" data-capital="Maputo">Mozambique</option>
                                    <option value="Myanmar" data-capital="Naypyidaw">Myanmar</option>
                                    <option value="Namibia" data-capital="Windhoek">Namibia</option>
                                    <option value="Nauru" data-capital="Yaren District">Nauru</option>
                                    <option value="Nepal" data-capital="Kathmandu">Nepal</option>
                                    <option value="Netherlands" data-capital="Amsterdam">Netherlands</option>
                                    <option value="New Caledonia" data-capital="Nouméa">New Caledonia</option>
                                    <option value="New Zealand" data-capital="Wellington">New Zealand</option>
                                    <option value="Nicaragua" data-capital="Managua">Nicaragua</option>
                                    <option value="Niger" data-capital="Niamey">Niger</option>
                                    <option value="Nigeria" data-capital="Abuja">Nigeria</option>
                                    <option value="Niue" data-capital="Alofi">Niue</option>
                                    <option value="Norfolk Island" data-capital="Kingston">Norfolk Island</option>
                                    <option value="North Korea" data-capital="Pyongyang">North Korea</option>
                                    <option value="Northern Mariana Islands" data-capital="Capitol Hill">Northern Mariana Islands</option>
                                    <option value="Norway" data-capital="Oslo">Norway</option>
                                    <option value="Oman" data-capital="Muscat">Oman</option>
                                    <option value="Pakistan" data-capital="Islamabad">Pakistan</option>
                                    <option value="Palau" data-capital="Ngerulmud">Palau</option>
                                    <option value="Panama" data-capital="Panama City">Panama</option>
                                    <option value="Papua New Guinea" data-capital="Port Moresby">Papua New Guinea</option>
                                    <option value="Paraguay" data-capital="Asunción">Paraguay</option>
                                    <option value="Peru" data-capital="Lima">Peru</option>
                                    <option value="Philippines" data-capital="Manila">Philippines</option>
                                    <option value="Pitcairn" data-capital="Adamstown">Pitcairn</option>
                                    <option value="Poland" data-capital="Warsaw">Poland</option>
                                    <option value="Portugal" data-capital="Lisbon">Portugal</option>
                                    <option value="Puerto Rico" data-capital="San Juan">Puerto Rico</option>
                                    <option value="Qatar" data-capital="Doha">Qatar</option>
                                    <option value="Republic of the Congo" data-capital="Brazzaville">Republic of the Congo</option>
                                    <option value="Romania" data-capital="Bucharest">Romania</option>
                                    <option value="Russia" data-capital="Moscow">Russia</option>
                                    <option value="Rwanda" data-capital="Kigali">Rwanda</option>
                                    <option value="Réunion" data-capital="Saint-Denis">Réunion</option>
                                    <option value="Saint Barthélemy" data-capital="Gustavia">Saint Barthélemy</option>
                                    <option value="Saint Helena, Ascension and Tristan da Cunha" data-capital="Jamestown">Saint Helena, Ascension and Tristan da Cunha</option>
                                    <option value="Saint Kitts and Nevis" data-capital="Basseterre">Saint Kitts and Nevis</option>
                                    <option value="Saint Lucia" data-capital="Castries">Saint Lucia</option>
                                    <option value="Saint Martin" data-capital="Marigot">Saint Martin</option>
                                    <option value="Saint Pierre and Miquelon" data-capital="Saint-Pierre">Saint Pierre and Miquelon</option>
                                    <option value="Saint Vincent and the Grenadines" data-capital="Kingstown">Saint Vincent and the Grenadines</option>
                                    <option value="Samoa" data-capital="Apia">Samoa</option>
                                    <option value="San Marino" data-capital="San Marino">San Marino</option>
                                    <option value="Sao Tome and Principe" data-capital="São Tomé">Sao Tome and Principe</option>
                                    <option value="Saudi Arabia" data-capital="Riyadh">Saudi Arabia</option>
                                    <option value="Senegal" data-capital="Dakar">Senegal</option>
                                    <option value="Serbia" data-capital="Belgrade">Serbia</option>
                                    <option value="Seychelles" data-capital="Victoria">Seychelles</option>
                                    <option value="Sierra Leone" data-capital="Freetown">Sierra Leone</option>
                                    <option value="Singapore" data-capital="Singapore">Singapore</option>
                                    <option value="Sint Maarten" data-capital="Philipsburg">Sint Maarten</option>
                                    <option value="Slovakia" data-capital="Bratislava">Slovakia</option>
                                    <option value="Slovenia" data-capital="Ljubljana">Slovenia</option>
                                    <option value="Solomon Islands" data-capital="Honiara">Solomon Islands</option>
                                    <option value="Somalia" data-capital="Mogadishu">Somalia</option>
                                    <option value="South Africa" data-capital="Pretoria">South Africa</option>
                                    <option value="South Georgia and the South Sandwich Islands" data-capital="King Edward Point">South Georgia and the South Sandwich Islands</option>
                                    <option value="South Korea" data-capital="Seoul">South Korea</option>
                                    <option value="Sudan" data-capital="Juba">South Sudan</option>
                                    <option value="Spain" data-capital="Madrid">Spain</option>
                                    <option value="Sri Lanka" data-capital="Sri Jayawardenepura Kotte, Colombo">Sri Lanka</option>
                                    <option value="State of Palestine" data-capital="Ramallah">State of Palestine</option>
                                    <option value="Sudan" data-capital="Khartoum">Sudan</option>
                                    <option value="Suriname" data-capital="Paramaribo">Suriname</option>
                                    <option value="Svalbard and Jan Mayen" data-capital="Longyearbyen">Svalbard and Jan Mayen</option>
                                    <option value="Swaziland" data-capital="Lobamba, Mbabane">Swaziland</option>
                                    <option value="Sweden" data-capital="Stockholm">Sweden</option>
                                    <option value="Switzerland" data-capital="Bern">Switzerland</option>
                                    <option value="Syrian Arab Republic" data-capital="Damascus">Syrian Arab Republic</option>
                                    <option value="Taiwan" data-capital="Taipei">Taiwan</option>
                                    <option value="Tajikistan" data-capital="Dushanbe">Tajikistan</option>
                                    <option value="Tanzania" data-capital="Dodoma">Tanzania</option>
                                    <option value="Thailand" data-capital="Bangkok">Thailand</option>
                                    <option value="Timor-Leste" data-capital="Dili">Timor-Leste</option>
                                    <option value="Togo" data-capital="Lomé">Togo</option>
                                    <option value="Tokelau" data-capital="Nukunonu, Atafu,Tokelau">Tokelau</option>
                                    <option value="Tonga" data-capital="Nukuʻalofa">Tonga</option>
                                    <option value="Trinidad and Tobago" data-capital="Port of Spain">Trinidad and Tobago</option>
                                    <option value="Tunisia" data-capital="Tunis">Tunisia</option>
                                    <option value="Turkey" data-capital="Ankara">Turkey</option>
                                    <option value="Turkmenistan" data-capital="Ashgabat">Turkmenistan</option>
                                    <option value="Turks and Caicos Islands" data-capital="Cockburn Town">Turks and Caicos Islands</option>
                                    <option value="TTuvaluV" data-capital="Funafuti">Tuvalu</option>
                                    <option value="Uganda" data-capital="Kampala">Uganda</option>
                                    <option value="Ukraine" data-capital="Kiev">Ukraine</option>
                                    <option value="United Arab Emirates" data-capital="Abu Dhabi">United Arab Emirates</option>
                                    <option value="United Kingdom" data-capital="London">United Kingdom</option>
                                    <option value="United States Minor Outlying Islands" data-capital="Washington, D.C.">United States Minor Outlying Islands</option>
                                    <option value="United States of America" data-capital="Washington, D.C.">United States of America</option>
                                    <option value="Uruguay" data-capital="Montevideo">Uruguay</option>
                                    <option value="Uzbekistan" data-capital="Tashkent">Uzbekistan</option>
                                    <option value="Vanuatu" data-capital="Port Vila">Vanuatu</option>
                                    <option value="Venezuela" data-capital="Caracas">Venezuela</option>
                                    <option value="Vietnam" data-capital="Hanoi">Vietnam</option>
                                    <option value="Virgin Islands (British)" data-capital="Road Town">Virgin Islands (British)</option>
                                    <option value="Virgin Islands (U.S.)" data-capital="Charlotte Amalie">Virgin Islands (U.S.)</option>
                                    <option value="Wallis and Futuna" data-capital="Mata-Utu">Wallis and Futuna</option>
                                    <option value="Western Sahara" data-capital="Laayoune">Western Sahara</option>
                                    <option value="Yemen" data-capital="Sana'a">Yemen</option>
                                    <option value="Zambia" data-capital="Lusaka">Zambia</option>
                                    <option value="Zimbabwe" data-capital="Harare">Zimbabwe</option>
                                </select>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-globe-asia"></span>
                                    </div>
                                </div>
                            </div>
                            <?= form_error('country', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>Other Information:</label>
                    </div>
                    <div class="col-md mb-3">
                        <textarea rows="5" class="form-control" id="info" name="info"></textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-8">
                        <div class="form-group">
                            <div class="custom-control icheck-primary">
                                <input type="checkbox" class="custom-control" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                            <?= form_error('terms', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <hr>
            <div class="text-center">
                <a href="login.html" class="text-center">I already have a membership</a>
            </div>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->