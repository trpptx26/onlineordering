<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Payroll</title>
    <link rel="stylesheet" href="eps.css">
    <!-- font style -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- 
    CTRL+K+C for turning code to comments
    CTRL+K+U for turning comments to code
    -->

    <?php

        // EMPLOYEE BASIC INFO
        // image variable
        $image = "";
        $employee_number = "";
        $department = "";
        $first_name = "";
        $middle_name = "";
        $last_name = "";
        $civil_status = "";
        $designation = "";
        $qualified_dependents_status = "";
        $paydate = "";
        $employee_status = "";

        //BASIC INCOME
        $basic_rate = "";
        $basic_hours = "";
        $basic_income = "";

        //HONORARIUM INCOME
        $honorarium_rate = "";
        $honorarium_hours = "";
        $honorarium_income = "";

        //OTHER INCOME
        $other_rate = "";
        $other_hours = "";
        $other_income = "";

        //SUMMARY INCOME
        $gross_income = "";
        $net_income = "";

        //REGULAR DEDUCTIONS
        $sss_contribution = "";
        $philhealth_contribution = "";
        $pagibig_contribution = "";
        $income_tax_contribution = "";

        //OTHER DEDUCTIONS
        $sss_loan = "";
        $pagibig_loan = "";
        $faculty_savings_deposit = "";
        $faculty_savings_loan = "";
        $salary_loan = "";
        $other_loans = "";

        //DEDUCTION SUMMARY
        $total_deductions = "";


        $conn = new mysqli('localhost','root','','employee');
        $sql = "SELECT * FROM employee";    
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();

        $valid_employee_number = "";
        $valid_qualified_dependents_status = "";
        $new_basic_rate = "";
        $new_basic_hours = "";
        $new_honorarium_rate = "";
        $new_honorarium_hours = "";
        $new_other_rate =  "";
        $new_other_hours = "";
        $new_sss_loan =  "";
        $new_pagibig_loan =  "";
        $new_faculty_savings_deposit =  "";
        $new_faculty_savings_loan =  "";
        $new_salary_loan =  "";
        $new_other_loans =  "";

        if(isset($_POST["calculate_gross_income"])){
            $employee_number = (int)$_POST["employee_number"];
            $valid_employee_number = (string)$row["employee_number"];
           
            if($employee_number == $valid_employee_number){

                $qualified_dependents_status = $_POST["qualified_dependents_status"];
                $valid_qualified_dependents_status = $qualified_dependents_status;

                //BASIC INCOME CALCULATION
                $basic_rate = (int)$_POST["basic_rate"];
                $basic_hours = (int)$_POST["basic_hours"];
                $basic_income = $basic_rate * $basic_hours;
                
                //HONORARIUM INCOME CALCULATION
                $honorarium_rate = (int)$_POST["honorarium_rate"];
                $honorarium_hours = (int)$_POST["honorarium_hours"];
                $honorarium_income = $honorarium_rate * $honorarium_hours;
    
                //OTHER INCOME CALCULATION
                $other_rate = (int)$_POST["other_rate"];
                $other_hours = (int)$_POST["other_hours"];
                $other_income = $other_rate * $other_hours;
    
                //GROSS INCOME CALCULATION
                $gross_income = $basic_income + $honorarium_income + $other_income;
    
                //REGULAR DEDUCTIONS
                //SSS 30%
                $sss_percentage = 30;
                $sss_contribution = ($sss_percentage/100)*$gross_income;
                //philhealth 3.5%
                $philheath_percentage = 3.5;
                $philhealth_contribution = ($philheath_percentage/100)*$gross_income;
                //pagibig 100
                $pagibig_contribution = 100;
                //income tax contribution is based in basic income = none
                //SSS LOAN
                $sss_loan = (int)$_POST["sss_loan"];
                //PAGIBIG LOAN
                $pagibig_loan = (int)$_POST["pagibig_loan"];
                //FACULTY SAVINGS DEPOSIT
                $faculty_savings_deposit = (int)$_POST["faculty_savings_deposit"];
                //FACULTY SAVINGS LOAN
                $faculty_savings_loan = (int)$_POST["faculty_savings_loan"];
                //SALARY LOAN
                $salary_loan = (int)$_POST["salary_loan"];
                //OTHER LOANS
                $other_loans = (int)$_POST["other_loans"];
                //DEDUCTION SUMMMARY (all deductions are added)
                $total_deductions = (float)$sss_contribution + (float)$philhealth_contribution + (float)$pagibig_contribution
                +(float)$sss_loan +(float)$pagibig_loan + (float)$faculty_savings_deposit + (float)$faculty_savings_loan
                + (float)$salary_loan + (float)$other_loans;
    
                $department = $row["department"];
                $first_name = $row["first_name"];
                $middle_name = $row["middle_name"];
                $last_name = $row["last_name"];
                $civil_status = $row["civil_status"];
                $designation = $row["designation"];
                $paydate = $row["paydate"];
                $employee_status = $row["employee_status"];

                $basic_rate = (int)$_POST["basic_rate"];
                $basic_hours = (int)$_POST["basic_hours"];
                $honorarium_rate = (int)$_POST["honorarium_rate"];
                $honorarium_hours = (int)$_POST["honorarium_hours"];
                $other_rate = (int)$_POST["other_rate"];
                $other_hours =(int)$_POST["other_hours"];
                $sss_loan = (int)$_POST["sss_loan"];
                $pagibig_loan = (int)$_POST["pagibig_loan"];
                $faculty_savings_deposit = (int)$_POST["faculty_savings_deposit"];
                $faculty_savings_loan = (int)$_POST["faculty_savings_loan"];
                $salary_loan = (int)$_POST["salary_loan"];
                $other_loans = (int)$_POST["other_loans"];


                $new_basic_rate = $_POST["basic_rate"];
                $new_basic_hours = $_POST["basic_hours"];
                $new_honorarium_rate = $_POST["honorarium_rate"];
                $new_honorarium_hours = $_POST["honorarium_hours"];
                $new_other_rate =  $_POST["other_rate"];
                $new_other_hours = $_POST["other_hours"];
                $new_sss_loan =  $_POST["sss_loan"];
                $new_pagibig_loan =  $_POST["pagibig_loan"];
                $new_faculty_savings_deposit =  $_POST["faculty_savings_deposit"];
                $new_faculty_savings_loan =  $_POST["faculty_savings_loan"];
                $new_salary_loan =  $_POST["salary_loan"];
                $new_other_loans =  $_POST["other_loans"];
            }
            if($employee_number != $valid_employee_number){
                $invalid_employee_number = "Invalid Employee Number";
                $valid_employee_number = $invalid_employee_number;
            }
               
            }
        
        if(isset($_POST["calculate_net_income"])){
            $employee_number = (int)$_POST["employee_number"];
            $valid_employee_number = (string)$row["employee_number"];

            if($employee_number == $valid_employee_number){
                $qualified_dependents_status = $_POST["qualified_dependents_status"];
                $valid_qualified_dependents_status = $qualified_dependents_status;
                                                //BASIC INCOME CALCULATION
                                                $basic_rate = (int)$_POST["basic_rate"];
                                                $basic_hours = (int)$_POST["basic_hours"];
                                                $basic_income = $basic_rate * $basic_hours;
                                                
                                                //HONORARIUM INCOME CALCULATION
                                                $honorarium_rate = (int)$_POST["honorarium_rate"];
                                                $honorarium_hours = (int)$_POST["honorarium_hours"];
                                                $honorarium_income = $honorarium_rate * $honorarium_hours;
                                    
                                                //OTHER INCOME CALCULATION
                                                $other_rate = (int)$_POST["other_rate"];
                                                $other_hours = (int)$_POST["other_hours"];
                                                $other_income = $other_rate * $other_hours;
                                    
                                                //GROSS INCOME CALCULATION
                                                $gross_income = $basic_income + $honorarium_income + $other_income;
                                    
                                                //REGULAR DEDUCTIONS
                                                //SSS 30%
                                                $sss_percentage = 30;
                                                $sss_contribution = ($sss_percentage/100)*$gross_income;
                                                //philhealth 3.5%
                                                $philheath_percentage = 3.5;
                                                $philhealth_contribution = ($philheath_percentage/100)*$gross_income;
                                                //pagibig 100
                                                $pagibig_contribution = 100;
                                                //income tax contribution is based in basic income = none
                                                //SSS LOAN
                                                $sss_loan = (int)$_POST["sss_loan"];
                                                //PAGIBIG LOAN
                                                $pagibig_loan = (int)$_POST["pagibig_loan"];
                                                //FACULTY SAVINGS DEPOSIT
                                                $faculty_savings_deposit = (int)$_POST["faculty_savings_deposit"];
                                                //FACULTY SAVINGS LOAN
                                                $faculty_savings_loan = (int)$_POST["faculty_savings_loan"];
                                                //SALARY LOAN
                                                $salary_loan = (int)$_POST["salary_loan"];
                                                //OTHER LOANS
                                                $other_loans = (int)$_POST["other_loans"];
                                                //DEDUCTION SUMMMARY (all deductions are added)
                                                $total_deductions = (float)$sss_contribution + (float)$philhealth_contribution + (float)$pagibig_contribution
                                                +(float)$sss_loan +(float)$pagibig_loan + (float)$faculty_savings_deposit + (float)$faculty_savings_loan
                                                + (float)$salary_loan + (float)$other_loans;
                                                //NET INCOME (gross income - total deduction)
                                                $net_income = $gross_income - $total_deductions;
                                    
                                                $department = $row["department"];
                                                $first_name = $row["first_name"];
                                                $middle_name = $row["middle_name"];
                                                $last_name = $row["last_name"];
                                                $civil_status = $row["civil_status"];
                                                $designation = $row["designation"];
                                                $paydate = $row["paydate"];
                                                $employee_status = $row["employee_status"]; 

                                                $basic_rate = (int)$_POST["basic_rate"];
                                                $basic_hours = (int)$_POST["basic_hours"];
                                                $honorarium_rate = (int)$_POST["honorarium_rate"];
                                                $honorarium_hours = (int)$_POST["honorarium_hours"];
                                                $other_rate = (int)$_POST["other_rate"];
                                                $other_hours =(int)$_POST["other_hours"];
                                                $sss_loan = (int)$_POST["sss_loan"];
                                                $pagibig_loan = (int)$_POST["pagibig_loan"];
                                                $faculty_savings_deposit = (int)$_POST["faculty_savings_deposit"];
                                                $faculty_savings_loan = (int)$_POST["faculty_savings_loan"];
                                                $salary_loan = (int)$_POST["salary_loan"];
                                                $other_loans = (int)$_POST["other_loans"];
                                
                                
                                                $new_basic_rate = $_POST["basic_rate"];
                                                $new_basic_hours = $_POST["basic_hours"];
                                                $new_honorarium_rate = $_POST["honorarium_rate"];
                                                $new_honorarium_hours = $_POST["honorarium_hours"];
                                                $new_other_rate =  $_POST["other_rate"];
                                                $new_other_hours = $_POST["other_hours"];
                                                $new_sss_loan =  $_POST["sss_loan"];
                                                $new_pagibig_loan =  $_POST["pagibig_loan"];
                                                $new_faculty_savings_deposit =  $_POST["faculty_savings_deposit"];
                                                $new_faculty_savings_loan =  $_POST["faculty_savings_loan"];
                                                $new_salary_loan =  $_POST["salary_loan"];
                                                $new_other_loans =  $_POST["other_loans"];
            }
            if($employee_number != $valid_employee_number){
                $invalid_employee_number = "Invalid Employee Number";
                $valid_employee_number = $invalid_employee_number;
            }    
        }
    ?>
    <div class="flex_container" id="main_container">
        

        <div id="left_panel">
            <div class="header">
                <img src="https://i.imgur.com/pk3nvlF.png" alt="Casan's Footwear Logo" width="400px">
            </div>
            <div class="subform" id="employee_basic_info">
                    <div>
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                            <div class="flex_container">
                                <div>
                                    <input type="image" value="<?php echo ($image)?>"><br>
                                </div>
                                <div style="margin-top: 130px;">
                                    <input name="image" type="submit" value="Choose File">
                                </div>
                            </div>
                        </form>
                    </div>                   
                </div>
            <form action="" method="post">

                <div class="flex_container" id="right_panel">
                    <div>
                    <label for="employee_number">Employee Number:</label>
                    <input type="text" name="employee_number" value="<?php 
                    $employee_number = (int)readline(); 
                    echo($valid_employee_number);
                    ?>" required><br>

                    <label for="department">First Name:</label>
                    <input type="text" value="<?php echo($department);?>" readonly><br>

                    <label for="first_name">First Name:</label>
                    <input type="text" value="<?php echo ($first_name); ?>" readonly><br>

                    <label for="middle_name">Middle Name:</label>
                    <input type="text" value="<?php echo ($middle_name);?>" readonly><br>

                    <label for="last_name">Last Name:</label>
                    <input type="text" value="<?php echo ($last_name);?>" readonly><br>

                    <label for="civil_status">Civil Status:</label>
                    <input type="text" value="<?php echo ($civil_status);?>" readonly><br>

                    <label for="designation">Designation:</label>
                    <input type="text" value="<?php echo ($designation);?>" readonly><br>

                    <label for="qualified_dependents_status">Qualified Dependents Status:</label>
                    <input type="text" name="qualified_dependents_status" value="<?php 
                    $qualified_dependents_status = (int)readline(); 
                    echo ($valid_qualified_dependents_status);
                    ?>" required><br>
                    
                    <label for="paydate">Paydate:</label>
                    <input type="text" value="<?php echo ($paydate);?>" readonly><br>

                    <label for="employee_status">Employee Status:</label>
                    <input type="text" value="<?php echo ($employee_status);?>" readonly><br>
                    </div>
                <div id="mid_column">
                    <div class="subform" id="basic_income">
                        <h2>BASIC INCOME</h2>
                        <label for="basic_rate">Rate/Hour:</label>
                        <input type="text" name="basic_rate" value="<?php $basic_rate = (int)readline(); echo($new_basic_rate);?>" required><br>
                        <label for="basic_hours">No. of Hours/Cutoff:</label>
                        <input type="text" name="basic_hours" value="<?php $basic_hours = (int)readline(); echo($new_basic_hours);?>" required><br>
                        <label for="basic_income">Income/Cutoff:</label>
                        <input type="text" value="<?php echo ($basic_income);?>" readonly><br>
                    </div>

                    <div class="subform" id="honorarium_income">
                        <h2>HONORARIUM INCOME</h2>
                        <label for="honorarium_rate">Rate/Hour:</label>
                        <input type="text" name="honorarium_rate" value="<?php $honorarium_rate = (int)readline(" "); echo($new_honorarium_rate);?>" required><br>
                        <label for="honorarium_hours">No. of Hours/Cutoff:</label>
                        <input type="text" name="honorarium_hours" value="<?php $honorarium_hours = (int)readline(" "); echo($new_honorarium_hours);?>" required><br>
                        <label for="honorarium_income">Income/Cutoff:</label>
                        <input type="text" value="<?php echo ($honorarium_income);?>" readonly><br>
                    </div>

                    <div class="subform" id="other_income">
                        <h2>OTHER INCOME</h2>
                        <label for="other_rate">Rate/Hour:</label>
                        <input type="text" name="other_rate" value="<?php $other_rate = (int)readline(" "); echo($new_other_rate);?>" required ><br>
                        <label for="other_hours">No. of Hours/Cutoff:</label>
                        <input type="text" name="other_hours" value="<?php $other_hours= (int)readline(" "); echo($new_other_hours);?>" required ><br>
                        <label for="other_income">Income/Cutoff:</label>
                        <input type="text" value="<?php echo ($other_income);?>" readonly><br>
                    </div>

                    <div class="subform" id="summary_income">
                        <h2>SUMMARY INCOME</h2>
                        <label for="other_rate">Gross Income:</label>
                        <input type="text" value="<?php echo ($gross_income);?>" readonly><br>
                        <label for="other_rate">Net Income:</label>
                        <input type="text" value="<?php echo ($net_income);?>" readonly><br>
                    </div>
                </div>

                <div id="right_column">
                    <div class="subform" id="regular_deductions">
                        <h2>REGULAR DEDUCTIONS</h2>
                        <label for="other_rate">SSS Contribution:</label>
                        <input type="text" value="<?php echo ($sss_contribution);?>" readonly><br>
                        <label for="other_rate">PhilHealth Contribution:</label>
                        <input type="text" value="<?php echo ($philhealth_contribution);?>" readonly><br>
                        <label for="other_rate">Pagibig Contribution:</label>
                        <input type="text" value="<?php echo (100);?>" readonly><br>
                        <label for="other_rate">Income Tax Contribution:</label>
                        <input type="text" value="<?php echo ($income_tax_contribution);?>" readonly><br>
                    </div>

                    <div class="subform" id="other_deductions">
                        <h2>OTHER DEDUCTIONS</h2>
                        <label for="other_rate">SSS Loan:</label>
                        <input type="text" name="sss_loan" value="<?php $sss_loan = (int)readline(); echo($new_sss_loan);?>" required><br>
                        <label for="other_rate">Pagibig Loan:</label>
                        <input type="text" name="pagibig_loan" value="<?php $pagibig_loan = (int)readline(); echo($new_pagibig_loan);?>" required><br>
                        <label for="other_rate">Faculty Savings Deposit:</label>
                        <input type="text" name="faculty_savings_deposit" value="<?php $faculty_savings_deposit = (int)readline(); echo($new_faculty_savings_deposit);?>" required><br>
                        <label for="other_rate">Faculty Savings Loan:</label>
                        <input type="text" name="faculty_savings_loan" value="<?php $faculty_savings_loan = (int)readline(); echo($new_faculty_savings_loan);?>" required><br>
                        <label for="other_rate">Salary Loan:</label>
                        <input type="text" name="salary_loan" value="<?php $salary_loan = (int)readline(); echo($new_salary_loan);?>" required><br>
                        <label for="other_rate">Other Loans:</label>
                        <input type="text" name="other_loans" value="<?php $other_loans = (int)readline(); echo($new_other_loans);?>" required><br>
                    </div>

                    <div class="subform" id="deduction_summary">
                        <h2>DEDUCTION SUMMARY</h2>
                        <label for="other_rate">Total Deductions:</label>
                        <input type="text" value="<?php echo ($total_deductions);?>" readonly><br>
                    </div>
                </div>
            </div>

            <div class="button_bar">
                <!-- BUTTONS -->
                <input name="calculate_gross_income" type="submit" value="CALCULATE GROSS INCOME">
                <input name="calculate_net_income" type="submit" value="CALCULATE NET INCOME">
                <input name="new" type="submit" value="NEW">
                <input name="preview_payslip" type="submit" value="PREVIEW PAYSLIP">
                <input name="print_payslip" type="submit" value="PRINT PAYSLIP">
                <input name="cancel" type="submit" value="CANCEL">
                <input name="close" type="submit" value="CLOSE">
            </div>
            </form>
        </div>
    </div>
    
</body>
</html>