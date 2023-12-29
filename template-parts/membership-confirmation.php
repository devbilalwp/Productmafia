<?php
// Template Name: confirmation-message

get_header();
?>

<Style>
    body {
        background-color:black;
    }
    @media (max-width:767px) {
        header#masthead {
            display: none;
        }
    }
</Style>

<section class="md:w-[600px] m-auto text-center relative z-[999] p-7">
    <div class="content-wraper p-6 bg-white">
        <div class="image w-[127px] m-auto">
            <img class="w-full" src="https://productmafia.staging.wpmudev.host/wp-content/uploads/2023/06/arrow-confiramrion-box.png">
        </div>
        <div class="heading">
            <h2 class="font-lato font-bold text-3xl text-black mt-5 mb-[10px]">Verification email sent!</h2>
        </div>
        <div class="discription">
            <p class="font-lato font-bold text-lg text-black mt-[10px] mb-[10px]">Click the button in the message we just sent you to verify your email address.</p>
        </div>
        <div class="done-btn text-end">
            <a class="font-lato font-normal text-xl text-white py-[10px] px-4 bg-[#153f6f] rounded hover:text-white" href="https://productmafia.staging.wpmudev.host/">Done</a>
        </div>
    </div>
    <div class="single-image mt-14 w-[220px] ml-auto mr-auto">
        <a class="w-full" href="#"><img src="https://productmafia.staging.wpmudev.host/wp-content/uploads/2023/06/trustplus.png"></a>
    </div>
</section>




