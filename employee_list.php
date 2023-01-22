<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
  
    <!-- font style -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
     <?php
      $conn = new mysqli('localhost','root','','employee');
      $sql = "SELECT * FROM employee";    
      $result = mysqli_query($conn, $sql);

      $first_name = "";
      $middle_name = "";
      $last_name = "";
      $suffix = "";
      $date_of_birth = "";
      $gender = "";


      if(isset($_POST["confirm"])){
        $first_name = $_POST["first_name"];
        $middle_name = $_POST["middle_name"];
        $last_name = $_POST["last_name"];
        $suffix = $_POST["suffix"];
        $date_of_birth = $_POST["date_of_birth"];

        $gender = $_POST["gender"];

        $nationality = $_POST["nationality"];

        $civil_status = $_POST["civil_status"];

        $department = $_POST["department"];
        $designation = $_POST["designation"];
        $qualified_dependents_status = $_POST["qualified_dependents_status"];
        $employee_status = $_POST["employee_status"];
        $paydate = $_POST["paydate"];
        $employee_number = $_POST["employee_number"];

        $query = "insert into employee(employee_number,department,first_name,middle_name,last_name,civil_status,designation,paydate,employee_status,qualified_dependents_status) 
                  values ('$employee_number','$department','$first_name','$middle_name','$last_name','$civil_status','$designation','$paydate','$employee_status','$qualified_dependents_status')";
        $run = mysqli_query($conn,$query); 
      }

      if(isset($_POST["employee_payroll"])){
        echo '
            <script>
            window.location.href = "employee_payroll.php";
            </script>';
      }

      if(isset($_POST["logout"])){
        echo '
            <script>
            window.location.href = "administrator_login.php";
            </script>';
      }
     ?>
    
    <div>
        <form action="" method="post">
            <div>
                <h1> Employees List </h1>
                <table>
                    <tr>
                        <th>Employee Number</th>
                        <th>Employee First Name</th>
                        <th>Employee Middle Name</th>
                        <th>Employee Last Name</th>
                        <th>Civil Status</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Employee Status</th>
                    </tr>

                    <?php

                        if ($result->num_rows > 0) {
                            while($rows = $result->fetch_assoc()) {
                                echo "<tr><td>" . $rows["employee_number"]. "</td>
                                          <td>" . $rows["first_name"] . "</td>
                                          <td>" . $rows["middle_name"] . "</td> 
                                          <td>" . $rows["last_name"] . "</td> 
                                          <td>" . $rows["civil_status"] . "</td> 
                                          <td>" . $rows["department"] . "</td>
                                          <td>" . $rows["designation"] . "</td>
                                          <td>" . $rows["employee_status"] . "</td></tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                    
                    ?>
                </table>
            </div>

            <div>
                <h2>New Employee</h2>
                <h3>Personal info</h3>
                <div>                 
                    <div>
                        <form>
                            <img id="preview" width="200" height="200">
                            <br>
                            <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                            <br>
                        </form>
                        <script>
                          function previewImage(event) {
                            var preview = document.getElementById('preview');
                            var image = event.target.files[0];
                            var reader = new FileReader();
                            reader.onload = function() {
                                preview.src = reader.result;
                            }
                            reader.readAsDataURL(image);
                            }
                        </script>
                        
                        <label for="first_name">First Name:</label>
                        <input type="text" name="first_name" value="<?php $first_name = readline();?>"required><br>
                
                        <label for="middle_name">Middle Name:</label>
                        <input type="text" name="middle_name" value="<?php $middle_name = readline();?>"required><br>

                        <label for="last_name">Last Name:</label>
                        <input type="text" name="last_name" value="<?php $last_name = readline();?>"required><br>

                        <label for="suffix">Suffix:</label>
                        <input type="text" name="suffix" value="<?php $suffix = readline();?>"><br>

                        <label for="date_of_birth">Date of Birth:</label>
                        <input type="date" name="date_of_birth" value="<?php $date_of_birth = readline();?>"required><br>
                    
                    
                        <label for="gender">Gender:</label>
                        <select id="gender" name="gender">
                            <option name="male" value="<?php $male = readline();?>">Male</option>
                            <option name ="female" value="<?php $female = readline();?>">Female</option>
                            <option name ="other" value="<?php $other = readline();?>">Other</option>
                        </select>
                    

                        <label for="nationality">Nationality:</label>
                        <select id="nationality" name="nationality">
                            <option value="Afghan">Afghan</option>
                            <option value="Albanian">Albanian</option>
                            <option value="Algerian">Algerian</option>
                            <option value="American">American</option>
                            <option value="Andorran">Andorran</option>
                            <option value="Angolan">Angolan</option>
                            <option value="Anguillan">Anguillan</option>
                            <option value="Citizen of Antigua and Barbuda">Citizen of Antigua and Barbuda</option>
                            <option value="Argentine">Argentine</option>
                            <option value="Armenian">Armenian</option>
                            <option value="Australian">Australian</option>
                            <option value="Austrian">Austrian</option>
                            <option value="Azerbaijani">Azerbaijani</option>

                            <option value="Bahamian">Bahamian</option>
                            <option value="Bahraini">Bahraini</option>
                            <option value="Bangladeshi">Bangladeshi</option>
                            <option value="Barbadian">Barbadian</option>
                            <option value="Belarusian">Belarusian</option>
                            <option value="Belgian">Belgian</option>
                            <option value="Belizean">Belizean</option>
                            <option value="Beninese">Beninese</option>
                            <option value="Bermudian">Bermudian</option>
                            <option value="Bhutanese">Bhutanese</option>
                            <option value="Bolivian">Bolivian</option>
                            <option value="Citizen of Bosnia and Herzegovina">Citizen of Bosnia and Herzegovina</option>
                            <option value="Botswanan">Botswanan</option>
                            <option value="Brazilian">Brazilian</option>
                            <option value="British">British</option>
                            <option value="British Virgin Islander">British Virgin Islander</option>
                            <option value="Bruneian">Bruneian</option>
                            <option value="Bulgarian">Bulgarian</option>
                            <option value="Burkinan">Burkinan</option>
                            <option value="Burmese">Burmese</option>
                            <option value="Burundian">Burundian</option>
          
                            <option value="Cambodian">Cambodian</option>
                            <option value="Cameroonian">Cameroonian</option>
                            <option value="Canadian">Canadian</option>
                            <option value="Cape Verdean">Cape Verdean</option>
                            <option value="Cayman Islander">Cayman Islander</option>
                            <option value="Central African">Central African</option>
                            <option value="Chadian">Chadian</option>
                            <option value="Chilean">Chilean</option>
                            <option value="Chinese">Chinese</option>
                            <option value="Colombian">Colombian</option>
                            <option value="Comoran">Comoran</option>
                            <option value="Congolese (Congo)">Congolese (Congo)</option>
                            <option value="Congolese (DRC)">Congolese (DRC)</option>
                            <option value="Cook Islander">Cook Islander</option>
                            <option value="Costa Rican">Costa Rican</option>
                            <option value="Croatian">Croatian</option>
                            <option value="Cuban">Cuban</option>
                            <option value="Cymraes">Cymraes</option>
                            <option value="Cymro">Cymro</option>
                            <option value="Cypriot">Cypriot</option>
                            <option value="Czech">Czech</option>

                            <option value="Danish">Danish</option>
                            <option value="Djiboutian">Djiboutian</option>
                            <option value="Dominican">Dominican</option>
                            <option value="Citizen of the Dominican Republic">Citizen of the Dominican Republic</option>
                            <option value="Dutch">Dutch</option>

                            <option value="East Timorese">East Timorese</option>
                            <option value="Ecuadorean">Ecuadorean</option>
                            <option value="Egyptian">Egyptian</option>
                            <option value="Emirati">Emirati</option>
                            <option value="English">English</option>
                            <option value="Equatorial Guinean">Equatorial Guinean</option>
                            <option value="Eritrean">Eritrean</option>
                            <option value="Estonian">Estonian</option>
                            <option value="Ethiopian">Ethiopian</option>

                            <option value="Faroese">Faroese</option>
                            <option value="Fijian">Fijian</option>
                            <option value="Filipino">Filipino</option>
                            <option value="Finnish">Finnish</option>
                            <option value="French">French</option>

                            <option value="Gabonese">Gabonese</option>
                            <option value="Gambian">Gambian</option>
                            <option value="Georgian">Georgian</option>
                            <option value="German">German</option>
                            <option value="Ghanaian">Ghanaian</option>
                            <option value="Gibraltarian">Gibraltarian</option>
                            <option value="Greek">Greek</option>
                            <option value="Greenlandic">Greenlandic</option>           
                            <option value="Grenadian">Grenadian</option>
                            <option value="Guamanian">Guamanian</option>
                            <option value="Guatemalan">Guatemalan</option>
                            <option value="Citizen of Guinea-Bissau">Citizen of Guinea-Bissau</option>
                            <option value="Guinean">Guinean</option>
                            <option value="Guyanese">Guyanese</option>

                            <option value="Haitian">Haitian</option>
                            <option value="Honduran">Honduran</option>
                            <option value="Hong Konger">Hong Konger</option>
                            <option value="Hungarian">Hungarian</option>

                            <option value="Icelandic">Icelandic</option>
                            <option value="Indian">Indian</option>
                            <option value="Indonesian">Indonesian</option>
                            <option value="Iranian">Iranian</option>
                            <option value="Iraqi">Iraqi</option>
                            <option value="Irish">Irish</option>
                            <option value="Israeli">Israeli</option>
                            <option value="Italian">Italian</option>
                            <option value="Ivorian">Ivorian</option>

                            <option value="Jamaican">Jamaican</option>
                            <option value="Japanese">Japanese</option>
                            <option value="Jordanian">Jordanian</option>

                            <option value="Kazakh">Kazakh</option>
                            <option value="Kenyan">Kenyan</option>
                            <option value="Kittitian">Kittitian</option>
                            <option value="Citizen of Kiribati">Citizen of Kiribati</option>
                            <option value="Kosovan">Kosovan</option>
                            <option value="Kuwaiti">Kuwaiti</option>
                            <option value="Kyrgyz">Kyrgyz</option>

                            <option value="Lao">Lao</option>
                            <option value="Latvian">Latvian</option>
                            <option value="Lebanese">Lebanese</option>
                            <option value="Liberian">Liberian</option>
                            <option value="Libyan">Libyan</option>
                            <option value="Liechtenstein citizen">Liechtenstein citizen</option>
                            <option value="Lithuanian">Lithuanian</option>
                            <option value="Luxembourger">Luxembourger</option>

                            <option value="Macanese">Macanese</option>
                            <option value="Macedonian">Macedonian</option>
                            <option value="Malagasy">Malagasy</option>
                            <option value="Malawian">Malawian</option>
                            <option value="Malaysian">Malaysian</option>
                            <option value="Maldivian">Maldivian</option>
                            <option value="Malian">Malian</option>
                            <option value="Maltese">Maltese</option>
                            <option value="Marshallese">Marshallese</option>
                            <option value="Martiniquais">Martiniquais</option>
                            <option value="Mauritanian">Mauritanian</option>
                            <option value="Mauritian">Mauritian</option>
                            <option value="Mexican">Mexican</option>
                            <option value="Micronesian">Micronesian</option>
                            <option value="Moldovan">Moldovan</option>
                            <option value="Monegasque">Monegasque</option>
                            <option value="Mongolian">Mongolian</option>
                            <option value="Montenegrin">Montenegrin</option>
                            <option value="Montserratian">Montserratian</option>
                            <option value="Moroccan">Moroccan</option>
                            <option value="Mosotho">Mosotho</option>
                            <option value="Mozambican">Mozambican</option>

                            <option value="Namibian">Namibian</option>
                            <option value="Nauruan">Nauruan</option>
                            <option value="Nepalese">Nepalese</option>
                            <option value="New Zealander">New Zealander</option>
                            <option value="Nicaraguan">Nicaraguan</option>
                            <option value="Nigerian">Nigerian</option>
                            <option value="Nigerien">Nigerien</option>
                            <option value="Niuean">Niuean</option>
                            <option value="North Korean">North Korean</option>
                            <option value="Northern Irish">Northern Irish</option>
                            <option value="Norwegian">Norwegian</option>
    
                            <option value="Omani">Omani</option>
                            <option value="Other">Other</option>

                            <option value="Pakistani">Pakistani</option>
                            <option value="Palauan">Palauan</option>
                            <option value="Palestinian">Palestinian</option>
                            <option value="Panamanian">Panamanian</option>
                            <option value="Papua New Guinean">Papua New Guinean</option>
                            <option value="Paraguayan">Paraguayan</option>
                            <option value="Peruvian">Peruvian</option>
                            <option value="Pitcairn Islander">Pitcairn Islander</option>
                            <option value="Polish">Polish</option>
                            <option value="Portuguese">Portuguese</option>
                            <option value="Prydeinig">Prydeinig</option>
                            <option value="Puerto Rican">Puerto Rican</option>

                            <option value="Qatari">Qatari</option>

                            <option value="Romanian">Romanian</option>
                            <option value="Russian">Russian</option>
                            <option value="Rwandan">Rwandan</option>

                            <option value="Salvadorean">Salvadorean</option>
                            <option value="Sammarinese">Sammarinese</option>
                            <option value="Samoan">Samoan</option>
                            <option value="Sao Tomean">Sao Tomean</option>
                            <option value="Saudi Arabian">Saudi Arabian</option>
                            <option value="Scottish">Scottish</option>
                            <option value="Senegalese">Senegalese</option>
                            <option value="Serbian">Serbian</option>
                            <option value="Citizen of Seychelles">Citizen of Seychelles</option>
                            <option value="Sierra Leonean">Sierra Leonean</option>
                            <option value="Singaporean">Singaporean</option>
                            <option value="Slovak">Slovak</option>
                            <option value="Slovenian">Slovenian</option>
                            <option value="Solomon Islander">Solomon Islander</option>
                            <option value="Somali">Somali</option>
                            <option value="South African">South African</option>
                            <option value="South Korean">South Korean</option>
                            <option value="South Sudanese">South Sudanese</option>
                            <option value="Spanish">Spanish</option>
                            <option value="Sri Lankan">Sri Lankan</option>
                            <option value="St Helenian">St Helenian</option>
                            <option value="St Lucian">St Lucian</option>
                            <option value="Stateless">Stateless</option>
                            <option value="Sudanese">Sudanese</option>
                            <option value="Surinamese">Surinamese</option>
                            <option value="Swazi">Swazi</option>
                            <option value="Swedish">Swedish</option>
                            <option value="Swiss">Swiss</option>
                            <option value="Syrian">Syrian</option>

                            <option value="Taiwanese">Taiwanese</option>
                            <option value="Tajik">Tajik</option>
                            <option value="Tanzanian">Tanzanian</option>
                            <option value="Thai">Thai</option>
                            <option value="Togolese">Togolese</option>
                            <option value="Tongan">Tongan</option>
                            <option value="Trinidadian">Trinidadian</option>
                            <option value="Tristanian">Tristanian</option>
                            <option value="Tunisian">Tunisian</option>
                            <option value="Turkish">Turkish</option>
                            <option value="Turkmen">Turkmen</option>
                            <option value="Turks and Caicos Islander">Turks and Caicos Islander</option>
                            <option value="Tuvaluan">Tuvaluan</option>

                            <option value="Ugandan">Ugandan</option>
                            <option value="Ukrainian">Ukrainian</option>
                            <option value="Uruguayan">Uruguayan</option>
                            <option value="Uzbek">Uzbek</option>

                            <option value="Vatican citizen">Vatican citizen</option>
                            <option value="Citizen of Vanuatu">Citizen of Vanuatu</option>
                            <option value="Venezuelan">Venezuelan</option>
                            <option value="Vietnamese">Vietnamese</option>
                            <option value="Vincentian">Vincentian</option>

                            <option value="Wallisian">Wallisian</option>
                            <option value="Welsh">Welsh</option>

                            <option value="Yemeni">Yemeni</option>

                            <option value="Zambian">Zambian</option>
                            <option value="Zimbabwean">Zimbabwean</option>
                        </select>
                        
                        <label for="civil_status">Civil Status:</label>
                        <select id="civil_status" name="civil_status">
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Divorced">Divorced</option>
                        </select>
                    </div>
                </div>
                <br>
                
                <div>
                    <label for="department">Department:</label>
                    <input type="text" name="department" value="<?php $department = readline();?>"required><br>

                    <label for="designtion">Designation:</label>
                    <input type="text" name="designation" value="<?php $designation = readline();?>"required><br>

                    <label for="qualified_dependents_status">Qualified Dep. Status:</label>
                    <input type="text" name="qualified_dependents_status" value="<?php $qualified_dependents_status = readline();?>"required><br>

                    <label for="employee_status">Employee Status:</label>
                    <input type="text" name="employee_status" value="<?php $employee_status = readline();?>"required><br>

                    <label for="paydate">Paydate:</label>
                    <input type="date" name="paydate" value="<?php $paydate = readline();?>"required><br>

                    <label for="employee_number">Employee Number:</label>
                    <input type="text" name="employee_number" value="<?php $employee_number = readline();?>"required><br>
                </div>
                <h2>Contact Info</h2>
                <div>
                    <label for="contact">Contact No.:</label>
                    <input type="text" name="contact" value="<?php $contact = readline();?>"required><br>
                    <label for="email">Email:</label>
                    <input type="text" name="email" value="<?php $email = readline();?>"required><br>
                    <label for="other_social_media">Other (Social Media):</label>
                    <input type="text" name="other_social_media" value="<?php $other_social_media = readline();?>"><br>
                    <label for="social_media">Social Media Account ID/No.:</label>
                    <input type="text" name="social_media" value="<?php $social_media = readline();?>"><br>
                </div>
            </div>

            <input name="confirm" type="submit" value="Save">
            <input type="reset">
            <br>
        </form>
        <form action="" method="post">
            <input name="employee_payroll" type="submit" value="Employee Payroll">
            <input name="logout" type="submit" value="Logout">
        </form>
    </div>
</body>
</html>
