# PHPFileUploader
A simple web application for uploading files

## About

In this simple PHP code, you can test for upload file from one folder to another.

This code written in simplest form.

Lets get started and talk about some portion of code.

When you open page first time :

![index page](/images/1.png "Image Title")

if you want to upload a file with size more than 50kB, an error will raise :

![index page](/images/2.png "Image Title")

This error also will raise when you try to upload a file with extension that does not exist in below list :

[
        "jpg",
        "jpag",
        "json",
        "pdf",
        "txt",
        "doc",
        "rtf",
        "gif",
        "rar"
    ]
    
you can modify this list in helper.php file if you want.

Your file after confirmation will moved to uploads folder with an random name that resulted from md5 algorithm .
