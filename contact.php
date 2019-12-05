<?php
$fname='';
$email='';
$company='';
$lname='';
$phone='';
$web='';
$service='';
$msg='';
$successmsg='';
$errormsg='';
$emailerror='';
$phoneerror='';
$weberror='';
$msgerror='';
$companyerror='';
$serviceerror='';
    if(empty($_POST["fname"]) || empty($_POST['lname'])){
        $errormsg="Name is required";
    }
    else{
        $fname = test_input($_POST['fname']);
        if(!preg_match("/^[a-zA-Z]*$/",$fname)){
            $errormsg="Only letter and whitespace allowed";
        }
        $lname = test_input($_POST['lname']);
        if(!preg_match("/^[a-zA-Z]*$/",$lname)){
            $errormsg="Only letter and whitespace allowed";
        }
    }
    if(empty($_POST['emailid'])){
        $emailerror="Email is required";
    }
    else{
        $email=test_input($_POST['emailid']);
    }
    if(empty($_POST['msg'])){
        $msgerror="Message is required";
    }
    else{
        $msg=test_input($_POST['msg']);
    }
    if(empty($_POST['web'])){
        $weberror="Website is required";
    }
    else{
        $web=test_input($_POST['web']);
    }
    if(empty($_POST['phone'])){
        $emailerror="Phone No. is required";
    }
    else{
        $phone=$_POST['phone'];
        if(!preg_match("/^[0-9]{10}+$/",$phone))
        {
            $phoneerror="Phone Number not Valid";
        }
    }
    if(empty($_POST['service'])){
        $serviceerror="Services are required";
    }
    else{
        $service=$_POST['service'];
    }
    if(empty($_POST['company'])){
        $companyerror="Company is required";
    }
    else{
        $company=test_input($_POST['company']);
    }
    if(!($fname=='') && !($lname=='') && !($service=='') && !($email=='') && !($phone=='') && !($msg=='') && !($web=='') && !($company==''))
    {   
        $nserv='';
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            foreach($service as $ser){
                $nserv.=$ser;
            }
            $name=$fname." ".$lname;
            $header=$fname.$lname."<".$email.">";
            $subject="New Customer Details";
            $nmsg = "Details of Customer are as follows
            Name : $name
            Email : $email
            Company:$company
            Website:$web
            Message:$msg
            Services Wanted : $nserv 
            Phone: $phone ";
            if(mail("reciever_mail_id@xyz.com",$subject,$nmsg,$header)){
                $successmsg="Message Sent Successfully....";
            }
            else{
                $successmsg="Mail Not Sent...We will try again";
            }
                
        }
        else{
            $emailerror="Invalid Email";
        }
    }

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function isValidEmail($email){
    return filter_var($email,FILTER_VALIDATE_EMAIL);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href='./index.css'>
        <title>
            Digitery-A Place of Digital Marketing
        </title>
    </head>
    <body>
        <!-- NavBar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="font-size:22px; padding-left:2rem;">
            
                <a class="navbar-brand" href="./index.html">
                    <div style="height: 100px; background-color: rgba(255,0,0,0.1);">
                <div class="h-100 d-inline-block" style="width: 120px; background-color: rgba(0,0,255,.1)">
                    <img src="digitery.jpg" style="width:120px; height:100px; border-radius: 12px;"/>
                </div>
                </div></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02" style="padding-left:2rem;">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active" style="padding-left:2rem;">
                  <a class="nav-link" href="./index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item" style="padding-left:2rem;">
                  <a class="nav-link" href="./about.html">About</a>
                </li>
                <li class="nav-item dropdown" style="padding-left:2rem;">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Services
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="./smm.html">Social Media Marketing</a>
                                <a class="dropdown-item" href="./seo.html">Search Engine Optimization</a>
                                <a class="dropdown-item" href="./cw.html">Content Writing</a>
                            </div>
                      </li>
                      
                <li class="nav-item" style="padding-left:2rem;">
                        <a class="nav-link" href="./blog.html">Blog</a>
                      </li>
                      
                <li class="nav-item" style="padding-left:2rem;">
                        <a class="nav-link" href="./contact.html">Contact</a>
                      </li>

              </ul>
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
            </div>
          </nav>

          <!-- Body Content -->
          <div class="w-100 p-3" style="background-color:rgb(212, 211, 211);"><h1 style="padding-left: 30rem;font-size:62px;"><b>Your Details are With Us</b></h1></div>
          <div class="w-100 p-3" style="background-color:rgb(212, 211, 211);"><h3 style="padding-left:36.5rem;font-size:21px;">Get My Free Proposal</h3></div>
            <h2>
                Contact Form Details & Mail Sending Confirmation
            </h2>
            <div class="w-100 p-3" style="padding:5rem;background-color:rgb(212,211,211);">
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">Your Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">Name</th>
                    <td><?php echo $fname." ".$lname;?><?php echo $errormsg;?></td>
                    </tr>
                    <tr>
                    <th scope="row">Company</th>
                    <td><?php echo $company?><?php echo $companyerror;?></td>
                    </tr>
                    <tr>
                    <th scope="row">Website</th>
                    <td><?php echo $web?><?php echo $weberror;?></td>
                    </tr>
                    <th scope="row">Email</th>
                    <td><?php echo $email;?><?php echo $emailerror;?></td>
                    </tr>
                    <th scope="row">Phone</th>
                    <td><?php echo $phone?><?php echo $phoneerror;?></td>
                    </tr>
                    <th scope="row">Message</th>
                    <td><?php echo $msg;?><?php echo $msgerror;?></td>
                    </tr>
                    <th scope="row">Services</th>
                    <td><?php foreach ($service as $ser){echo $ser." ";}?><?php echo $serviceerror;?></td>
                    </tr>
                    <th scope="row">Confirmation Sent</th>
                    <td><?php echo $successmsg;?></td>
                    </tr>
                </tbody>
                </table>
            
          
            </div>
          <!-- Footer -->

                          <div class="row justify-content-around" style="padding:5rem;">
                                <div class="col-4">
                                        <img src="digitery.jpg" style="width:120px; height:100px; border-radius: 12px;"/>
                                        <p>Digitery Internet Marketing Agency is a full-service digital marketing agency. Attract, Impress, and Convert more leads online and get results with Digitery.</p>
                                    </div>
                                <div class="col-4" style="padding-left:7.5rem;">
                                        <img src="digitery.jpg" style="width:240px; height:240px; border-radius: 12px;"/>
                                    
                                </div>
                                <div class="col-4">
                                    <div style="padding-left: 15rem;">
                                        <a href="#"><img src="fb.jpg" style=" ;border-radius: 12px;display: inline; width:50px"> </a>
                                        <a href="#"><img src="insta.jpg" style="border-radius:12px;display: inline; width:50px"> </a>
                                    </div>
                                    <div style="padding-left:5rem;">
                                        <h3>CALL +91-1234567890</h3>
                                        <h5>Contact Us> Give Us Your Response</h5>

                                    </div>
                                </div>
                              </div>

                              <footer style="background-color:#343A40; color:antiquewhite;">
                                    <div class="w-100 p-3" style="background-color:#343A40;"><h1 style="padding-left: 20rem;font-size:52px;">Growing Businesses Since 2019</b></h1></div>
                                    <div class="w-100 p-3" style="background-color:#343A40;"><h2 style="padding-left:17rem;font-size:32px;">Made with Favorite Heart Buttonin 12 cities around the India</h2></div>
                                   
                                    <div class="container" style="background-color:#343A40 ;">
                                            <div class="row">
                                              <div class="col-md-4">
                                                <h3>Jodhpur</h3>
                                                <h3>Jaipur</h3>
                                                <h3>Ajmer</h3>
                                                <h3>Udaipur</h3>
                                              </div>
                                              <div class="col-md-4">
                                                <h3>Delhi</h3>
                                                <h3>Gurgaon</h3>
                                                <h3>Noida</h3>
                                                <h3>Faridabad</h3>
                                              </div>
                                              <div class="col-md-4">
                                                    <h3>Chennai</h3>
                                                    <h3>Bangalore</h3>
                                                    <h3>Mumbai</h3>
                                                    <h3>Lucknow</h3>
                                              </div>
                                            </div>
                                        </div>


                                        <div class="w-100 p-3" style=" color:antiquewhite;background-color:#343A40;"><h3 style="padding-left:16rem;font-size:18px;">&copy;2019 - Thrive Internet Marketing Agency / Locations / Write For Us / Refer Thrive / Terms / Privacy Policy / Sitemap</h3></div>
                          
                                    </footer>

            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>