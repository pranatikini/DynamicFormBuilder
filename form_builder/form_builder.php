 <?php 	 
		session_start();
		if(empty($_SESSION)){
			header("Location: /Forms Master/login/login.php");
		}
		$conn = mysqli_connect('localhost', 'root', '', $_SESSION['login_user']);
	    if($_SERVER["REQUEST_METHOD"]=="POST"){
		$arr = json_decode($_POST["JSON"]);
		
		$domDocument = new DOMdocument('1.0');

		$root = $domDocument->createElement('html'); 
		$root = $domDocument->appendChild($root); 
		
		$head = $domDocument->createElement('head');  
		$meta = $domDocument->createElement('meta');
		$metaCharset = $domDocument->createAttribute('charset');
		$metaCharset->value = 'UTF-8';
		$meta->appendChild($metaCharset);
		$head = $root->appendChild($head); 

		$script2 = $domDocument->createElement('script');
		$script2src = $domDocument->createAttribute('src');
		$script2src->value = 'https://code.jquery.com/jquery-3.1.0.min.js';
		$script2->appendChild($script2src);
		$head->appendChild($script2);
		$head->appendChild($meta);

		$meta = $domDocument->createElement('meta');
		$metaName = $domDocument->createAttribute('name');
		$metaName->value = 'viewport';
		$metaContent = $domDocument->createAttribute('content');
		$metaContent->value = 'width=device-width, initial-scale=1, shrink-to-fit=no';
		$meta->appendChild($metaName);
		$meta->appendChild($metaContent);
		$head->appendChild($meta);

		$title = $domDocument->createElement('title', 'Recurse Registration Form');
		$head->appendChild($title);

		$link = $domDocument->createElement('link');
		$href = $domDocument->createAttribute('href');
		$href->value = "https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i";
		$link->appendChild($href);
		$rel = $domDocument->createAttribute('rel');
		$rel->value = 'stylesheet';
		$link->appendChild($rel);

		$head->appendChild($link);

		
		$link = $domDocument->createElement('link');
		$href = $domDocument->createAttribute('href');
		$href->value = "css/main.css";
		$link->appendChild($href);
		$rel = $domDocument->createAttribute('rel');
		$rel->value = 'stylesheet';
		$link->appendChild($rel);
		$media = $domDocument->createAttribute('media');
		$rel->value = 'stylesheet';
		$link->appendChild($media);

		$head->appendChild($link);
		
		
		$script = $domDocument->createElement('script');
		$scriptType = $domDocument->createAttribute('type');
		$scriptSrc = $domDocument->createAttribute('src');
		$scriptType->value = "text/javascript";
		$scriptSrc->value = "validation.js";
		$script->appendChild($scriptType);
		$script->appendChild($scriptSrc);
		$head->appendChild($script);

		

		$body = $domDocument->createElement('body'); 
		$body = $root->appendChild($body); 
		$div = $domDocument->createElement('div');
		
		
		$divChild1 = $domDocument->createElement('div');
		$class=$domDocument->createAttribute('class');
		$class->value = "page-wrapper bg-blue p-t-100 p-b-100 font-robo";
		$divChild1->appendChild($class);
		
		$divChild2 = $domDocument->createElement('div');
		$class=$domDocument->createAttribute('class');
		$class->value = "wrapper wrapper--w680";
		$divChild2->appendChild($class);
		

		$divChild3 = $domDocument->createElement('div');
		$class=$domDocument->createAttribute('class');
		$class->value = "card card-1";
		$divChild3->appendChild($class);


		$divChild4 = $domDocument->createElement('div');
		$class=$domDocument->createAttribute('class');
		$class->value = "card-heading";
		$divChild4->appendChild($class);
		$divChild3->appendChild($divChild4);
		
		
		$divChild5 = $domDocument->createElement('div');
		$class=$domDocument->createAttribute('class');
		$class->value = "card-body";
		$divChild5->appendChild($class);


		$text = $domDocument->createTextNode('Form');  

		$form = $domDocument->createElement('form');
		$form = $body->appendChild($form);
		$onsubmit = $domDocument->createAttribute('onsubmit');
		$onsubmit->value = "validForm()";
		$formAttribute = $domDocument->createAttribute('method');
		$formAttribute->value = 'post';
		$formAction = $domDocument->createAttribute('action');
		$formAction->value = '/Forms Master/login/Welcome/FormBuilder/insert.php';
		$formId = $domDocument->createAttribute('id');
		$formId->value = 'actual_form';
		$form->appendChild($formAttribute);
		$form->appendChild($onsubmit);
		$form->appendChild($formAction);
		$form->appendChild($formId);



		foreach ($arr as $key => $value) {
			if($key=="Email"){
				$label = $domDocument->createElement('label');
				$form->appendChild($label);
				$text = $domDocument->createTextNode('Email');
				$text = $label->appendChild($text);
				$input = $domDocument->createElement('input');
				$inputAttribute = $domDocument->createAttribute('type');
				$inputAttribute->value = 'text';
				$inputId = $domDocument->createAttribute('id');
				$inputId->value = $key;
				$inputFunction = $domDocument->createAttribute('onchange');
				$inputFunction->value = "emailValidation('".$key."')";
				$input->appendChild($inputAttribute);
				$input->appendChild($inputId);
				$input->appendChild($inputFunction);
				$inputName = $domDocument->createAttribute('name');
				$inputName->value = $key;
				$input->appendChild($inputName);
				$form->appendChild($input);
				$form->appendChild($domDocument->createElement('br'));
				$error = $domDocument->createElement('label');
				$errorId = $domDocument->createAttribute('id');
				$errorStyle = $domDocument->createAttribute('style');
				$errorId->value = $key."1";
				$errorStyle->value = "color: red; visibility: hidden;";
				$error->appendChild($errorId);
				$error->appendChild($errorStyle);
				$span = $domDocument->createElement('span');
				$errorText = $domDocument->createTextNode('Invalid Email Id');
				$span->appendChild($errorText);
				$error->appendChild($span);
				$form->appendChild($error);
				$form->appendChild($domDocument->createElement('br'));
				$form->appendChild($domDocument->createElement('br'));
				continue;
			}
			if($key=="Contact_No"){
				$label = $domDocument->createElement('label');
				$form->appendChild($label);
				$text = $domDocument->createTextNode('Contact No');
				$text = $label->appendChild($text);
				$input = $domDocument->createElement('input');
				$inputAttribute = $domDocument->createAttribute('type');
				$inputAttribute->value = 'text';
				$inputId = $domDocument->createAttribute('id');
				$inputId->value = $key;
				$inputFunction = $domDocument->createAttribute('onchange');
				$inputFunction->value = "numberValidation('".$key."')";
				$input->appendChild($inputAttribute);
				$input->appendChild($inputId);
				$input->appendChild($inputFunction);
				$inputName = $domDocument->createAttribute('name');
				$inputName->value = $key;
				$input->appendChild($inputName);
				$form->appendChild($input);
				$form->appendChild($domDocument->createElement('br'));
				$error = $domDocument->createElement('label');
				$errorId = $domDocument->createAttribute('id');
				$errorStyle = $domDocument->createAttribute('style');
				$errorId->value = $key."1";
				$errorStyle->value = "color: red; visibility: hidden;";
				$error->appendChild($errorId);
				$error->appendChild($errorStyle);
				$span = $domDocument->createElement('span');
				$errorText = $domDocument->createTextNode('Invalid Mobile Number');
				$span->appendChild($errorText);
				$error->appendChild($span);
				$form->appendChild($error);
				$form->appendChild($domDocument->createElement('br'));
				$form->appendChild($domDocument->createElement('br'));
				continue;
			}
			switch ($value[0]) {
				case 'text':
					$divChild = $domDocument->createElement('div');
					$divAttr = $domDocument->createAttribute('class');
					$divAttr->value = 'input-group';
					$divChild->appendChild($divAttr);
					$inputChild = $domDocument->createElement('input');
					$inputClass = $domDocument->createAttribute('class');
					$inputClass->value = 'input--style-1';
					$inputType = $domDocument->createAttribute('type');
					$inputType->value = 'text';
					$inputPlaceholder = $domDocument->createAttribute('placeholder');
					$inputPlaceholder->value = strtoupper($key);
					$inputName = $domDocument->createAttribute('name');
					$inputName->value = $key;

					$inputChild->appendChild($inputClass);
					$inputChild->appendChild($inputType);
					$inputChild->appendChild($inputPlaceholder);
					$inputChild->appendChild($inputName);

					$divChild->appendChild($inputChild);
					$form->appendChild($divChild);
					break;
				case 'textarea':
					$divChild = $domDocument->createElement('div');
					$divAttr = $domDocument->createAttribute('class');
					$divAttr->value = 'input-group';
					$divChild->appendChild($divAttr);
					$inputChild = $domDocument->createElement('input');
					$inputClass = $domDocument->createAttribute('class');
					$inputClass->value = 'input--style-1';
					$inputType = $domDocument->createAttribute('type');
					$inputType->value = 'text';
					$inputPlaceholder = $domDocument->createAttribute('placeholder');
					$inputPlaceholder->value = strtoupper($key);
					$inputName = $domDocument->createAttribute('name');
					$inputName->value = $key;

					$inputChild->appendChild($inputClass);
					$inputChild->appendChild($inputType);
					$inputChild->appendChild($inputPlaceholder);
					$inputChild->appendChild($inputName);

					$divChild->appendChild($inputChild);
					$form->appendChild($divChild);
					break;
				case 'radio':
					$divCheckbox = $domDocument->createElement('div');
					$h5 = $domDocument->createElement('h5', strtoupper($key));
					$h5Child = $domDocument->createAttribute('class');
					$h5Child->value = 'input--style-1';
					$h5->appendChild($h5Child);
					$divCheckbox->appendChild($h5);



					for ($i=1; $i < count($value); $i++) {
						$divValue = $domDocument->createElement('div');
						$divValueClass = $domDocument->createAttribute('class');
						$divValueClass->value = 'input--style-1';
						$divValue->appendChild($divValueClass);

						$input = $domDocument->createElement('input');
						$inputType = $domDocument->createAttribute('type');
						$inputName = $domDocument->createAttribute('name');
						$inputType->value = 'radio';
						$inputName->value = $key."[]";
						$input->appendChild($inputType);
						$input->appendChild($inputName);
						$valueR = $domDocument->createAttribute('value');
						$valueR->value = $value[$i];
						$input->appendChild($valueR);
						$label = $domDocument->createElement('label');
						$text = $domDocument->createTextNode($value[$i]);
						$label->appendChild($text);
						$divValue->appendChild($input);
						$divValue->appendChild($label);	
						$divCheckbox->appendChild($divValue);
					}
					$form->appendChild($divCheckbox);
					break;

				case 'checkbox':
					$divCheckbox = $domDocument->createElement('div');
					$h5 = $domDocument->createElement('h5', strtoupper($key));
					$h5Child = $domDocument->createAttribute('class');
					$h5Child->value = 'input--style-1';
					$h5->appendChild($h5Child);
					$divCheckbox->appendChild($h5);



					for ($i=1; $i < count($value); $i++) {
						$divValue = $domDocument->createElement('div');
						$divValueClass = $domDocument->createAttribute('class');
						$divValueClass->value = 'input--style-1';
						$divValue->appendChild($divValueClass);

						$input = $domDocument->createElement('input');
						$inputType = $domDocument->createAttribute('type');
						$inputName = $domDocument->createAttribute('name');
						$inputType->value = 'checkbox';
						$inputName->value = $key."[]";
						$input->appendChild($inputType);
						$input->appendChild($inputName);
						$valueR = $domDocument->createAttribute('value');
						$valueR->value = $value[$i];
						$input->appendChild($valueR);
						$label = $domDocument->createElement('label');
						$text = $domDocument->createTextNode($value[$i]);
						$label->appendChild($text);
						$divValue->appendChild($input);
						$divValue->appendChild($label);	
						$divCheckbox->appendChild($divValue);
					}
					$form->appendChild($divCheckbox);
					break;
				default:
					break;
			}
			$hidden = $domDocument->createElement("input");
			$htype = $domDocument->createAttribute("type");
			$hname = $domDocument->createAttribute("name");
			$hvalue = $domDocument->createAttribute("value");
			$htype->value = "hidden";
			$hname->value = "form_name";
			$hvalue->value = $_POST["form_name"];
			$hidden->appendChild($htype);
			$hidden->appendChild($hname);
			$hidden->appendChild($hvalue);
			$form->appendChild($hidden);
		}

		$submitDiv = $domDocument->createElement('div');
		$sumbitChild = $domDocument->createAttribute('class');
		$sumbitChild->value = 'p-t-20';
		$submitDiv->appendChild($sumbitChild);

		$SubmitButton = $domDocument->createElement('button', 'Submit');
		$SubmitButtonClass = $domDocument->createAttribute('class');
		$SubmitButtonClass->value = 'btn btn--radius btn--green';
		$SubmitButtonType = $domDocument->createAttribute('type');
		$SubmitButtonType->value = 'submit';
		$SubmitButton->appendChild($SubmitButtonClass);
		$SubmitButton->appendChild($SubmitButtonType);
		$submitDiv->appendChild($SubmitButton);
		$form->appendChild($submitDiv);

		$divChild5->appendChild($form);
		$divChild3->appendChild($divChild5);
		$divChild2->appendChild($divChild3);
		$divChild1->appendChild($divChild2);
		$div->appendChild($divChild1);
		$body->appendChild($div);


		$dir = dirname(__FILE__, 4);
		$file =  $dir . '\\content\\' .$_SESSION['login_user'] .'\\'. $_POST["form_name"].".html";
		echo $dir;
		$var = $domDocument->saveHTML();
		file_put_contents($file,$var);
		
		$redirect = new DOMdocument();

		$root = $redirect->createElement('html'); 
		$root = $redirect->appendChild($root); 
 
		$head = $redirect->createElement('head');  
		$head = $root->appendChild($head); 

		$script = $redirect->createElement('script');
		$src = $redirect->createAttribute('src');
		$src->value = "copyText.js";
		$type = $redirect->createAttribute("type");
		$type->value = "text/javascript";
		$script->appendChild($type);
		$script->appendChild($src);
		$script2 = $redirect->createElement('script');
		$src2  = $redirect->createAttribute('src');
		$src2->value = "https://code.jquery.com/jquery-3.1.0.min.js";
		$script2->appendChild($src2);
		$head->appendChild($script);
		$head->appendChild($script2);

		$body = $redirect->createElement('body'); 
		$body = $root->appendChild($body); 

		$h1 = $redirect->createElement('h1'); 
		$h1 = $body->appendChild($h1); 
		$text = $redirect->createTextNode('Your Form Link: ');  
		$text = $h1->appendChild($text); 

		$ref = $redirect->createElement("a");
		$t = $redirect->createTextNode( $file );
		$id = $redirect->createAttribute("id");
		$id->value = "formlink";
		$link = $redirect->createAttribute("href");
		$link->value =  "/Forms Master/content/" .  $_SESSION['login_user'] . "/" . $_POST['form_name'] . ".html";
		$ref->appendChild($id);
		$ref->appendChild($link);
		$ref->appendChild($t);
		$body->appendChild($ref);

		$copy = $redirect->createElement("button");
		$onclick = $redirect->createAttribute("onclick");
		$t = $redirect->createTextNode("Copy Text");
		$onclick->value="copyFunction()";
		$copy->appendChild($onclick);
		$copy->appendChild($t);
		$body->appendChild($copy);

		$f = "form_link.html";
		$v = $redirect->saveHTML();
		file_put_contents($f, $v);

		$sql = "CREATE TABLE IF NOT EXISTS `$_POST[form_name]` (";
		foreach ($arr as $key => $value) {
			$sql = $sql."`$key` VARCHAR(255) NOT NULL";
			$sql = $sql.", ";
		}
		$sql = substr($sql, 0,strlen($sql)-2);
		$sql = $sql.")";
		$res = mysqli_query($conn,$sql);
		echo "</br>";
		$sql = "INSERT INTO tableslist (name, description, timestamp_, active) VALUES ('$_POST[form_name]', '$_POST[describe_]', now(), '1')";
		$res = mysqli_query($conn, $sql);
		if(!empty($_SESSION)){
			header("Location: $f");

		}
		else{
			header("Location: /Forms Master/login/login.php");
		}
	}
?>
 <!DOCTYPE html>
<html>
    <head>
    	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
		<meta content="utf-8" http-equiv="encoding">
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">
        <style>
        html,
        body {
            max-width: 100%;
            overflow-x: hidden;
        }

        body {

            background-color: #2C6ED5;
            margin: auto;
            font-family: "Roboto", "Arial", "Helvetica Neue", sans-serif;




        }

        .font-robo {
            font-family: "Roboto", "Arial", "Helvetica Neue", sans-serif;
        }

        .title {
            margin-bottom: 15px;
            text-align: center;
            font-weight: 400;

        }


        form {
            display: inline-block;
            justify-content: center;
            align-content: center;
        }



        h1 {


            font-size: 255%;
            text-align: center;
            font-family: sans-serif;
        }

        h2 {
            font-size: 30px;
        }

        h5 {
            font-size: 15px;
        }




        #addfield a {
            position: fixed;
            right: -200px;
            transition: 0.3s;
            padding-top: 10px;
            padding-bottom: 10px;
            width: 300px;
            height: 350px;
            text-decoration: none;
            font-size: 20px;
            color: white;
            border-radius: 5px 0 0 5px;
            text-align: center;
            background-color: white;
            z-index: 9;
        }

        #addfield a:hover {
            right: 0;
            color: black;
        }

        #add {
            top: 27.5%;

            border: 6px solid #4CAF50;

            background: #ffffff;

            color: black;
        }


        .dd:hover .dd-content {

            display: block;

        }

        .dd {
            border: 3px solid #4CAF50;

            background: #ffffff;

            color: black;

            width: 150px;

            position: absolute;

            right: 0px;

            border-radius: 2px;

            top: 50%;

        }

        .dd-content div:hover {

            background: #4CAF50;
            color: white;
            border: 6px solid #4CAF50;

        }

        div.error-label:before {
            content: ' ';
            height: 0;
            position: absolute;
            width: 0;
            left: -36px;
            top: 167.5px;
            border: 15px solid transparent;
            border-right-color: #4CAF50;
        }


        ::-webkit-file-upload-button {
            border: 3px solid #4CAF50;

            background: #4CAF50;

            color: #ffffff;

            border-radius: 2px;

        }



        .form__group {

            position: relative;

            margin-top: 10px;

            width: 100%;

            justify-content: center;

        }



        .form__field {

            font-family: inherit;

            width: 100%;

            border: 0;

            border-bottom: 1.5px solid #9b9b9b;

            outline: 0;

            font-size: 1.3rem;

            color: black;

            padding: 8px 0;

            background: transparent;

            transition: border-color 0.20s;

            justify-content: center;




        }



        .form__field::placeholder {

            color: grey;

        }



        .form__field:placeholder-shown~.form__label {

            font-size: 1.3rem;

            cursor: text;

            top: 20px;

        }



        .form__label {

            position: absolute;

            top: 0;

            display: block;

            transition: 0.3s;

            font-size: 1rem;

            color: #9b9b9b;

        }



        .form__field:focus {

            padding-bottom: 6px;

            font-weight: 700;

            border-width: 3px;

            border-image: linear-gradient(to right, #11998e, #38ef7d);
            border-image-slice: 1;

        }






        .form__field:required,

        .form__field:invalid {

            box-shadow: none;

        }



        .box {

            font-family: 'Poppins', sans-serif;

            display: flex;

            flex-direction: column;

            justify-content: center;

            align-items: center;

            min-height: 100vh;

            font-size: 1.5rem;

            background-color: #2C6ED5;

            box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
        }

        .form__fields {

            font-family: inherit;

            width: 100%;

            border: 0;

            border-bottom: 1.5px solid white;

            outline: 0;

            font-size: 1.3rem;

            color: black;

            padding: 8px 0;

            background: transparent;

            transition: border-color 0.20s;

            justify-content: center;




        }



        .form__fields::placeholder {

            color: grey;

        }



        .form__fields:placeholder-shown~.form__label {

            font-size: 1.3rem;

            cursor: text;

            top: 20px;

        }



        .form__label {

            position: absolute;

            top: 0;

            display: block;

            transition: 0.3s;

            font-size: 1rem;

            color: #9b9b9b;

        }



        .form__fields:focus {

            padding-bottom: 6px;

            font-weight: 700;

            border-width: 3px;

            border-image: linear-gradient(to right, #11998e, #38ef7d);

            border-image-slice: 1;

        }






        .form__fields:required,

        .form__fields:invalid {

            box-shadow: none;

        }





        .contain {

            width: 80%;

            border-radius: 1px;

            background-color: white;

            padding-left: 18%;

            padding-top: 55px;

            padding-bottom: 65px;

            justify-content: center;

        }



        button {

            background-color: #4CAF50;

            border: none;

            color: white;

            padding: 10px 32px;

            text-align: center;

            text-decoration: none;

            display: inline-block;

            font-size: 16px;

            margin: 4px 2px;

            cursor: pointer;

            border-radius: 2px;

        }



        .con {

            background-color: #ffffff;

            width: 73%;
        }


        .transparent {
            font-family: inherit;

            border: 0;

            border-bottom: 1.5px solid #9b9b9b;

            outline: 0;

            font-size: 1.3rem;

            color: black;

            padding: 8px 0;

            background: transparent;

            transition: border-color 0.20s;

            justify-content: center;




        }

        .transparent:focus {

            padding-bottom: 6px;

            font-weight: 700;

            border-width: 3px;

            border-image: linear-gradient(to right, #11998e, #38ef7d);

            border-image-slice: 1;

        }

        textarea {
            height: 32px;
            justify-content: center;
        }

        img {
            width: 100%;
        }

        .dsn {
            width: 340px;
            height: 300px;
            border: white;
            overflow: auto;
        }

        .ln {
            border: 0;
            border-bottom: 1.5px solid #9b9b9b;
            width: 100%;
        }

        .note {
            text-align: center;
            font-size: small;
            margin-left: 0px;
        }

        /*CHECKBOX AND RADIO BUTTON CSS*/
        @supports (-webkit-appearance: none) or (-moz-appearance: none) {

            input[type='checkbox'],
            input[type='radio'] {
                --active: #275EFE;
                --active-inner: #fff;
                --focus: 2px rgba(39, 94, 254, .3);
                --border: #BBC1E1;
                --border-hover: #275EFE;
                --background: #fff;
                --disabled: #F6F8FF;
                --disabled-inner: #E1E6F9;
                -webkit-appearance: none;
                -moz-appearance: none;
                height: 21px;
                outline: none;
                display: inline-block;
                vertical-align: baseline;
                position: relative;
                margin-right: 10px;
                cursor: pointer;
                border: 1px solid var(--bc, var(--border));
                background: var(--b, var(--background));
                -webkit-transition: background .3s, border-color .3s, box-shadow .2s;
                transition: background .3s, border-color .3s, box-shadow .2s;
            }

            input[type='checkbox']:after,
            input[type='radio']:after {
                content: '';
                display: block;
                left: 0;
                top: 0;
                position: absolute;
                -webkit-transition: opacity var(--d-o, 0.2s), -webkit-transform var(--d-t, 0.3s) var(--d-t-e, ease);
                transition: opacity var(--d-o, 0.2s), -webkit-transform var(--d-t, 0.3s) var(--d-t-e, ease);
                transition: transform var(--d-t, 0.3s) var(--d-t-e, ease), opacity var(--d-o, 0.2s);
                transition: transform var(--d-t, 0.3s) var(--d-t-e, ease), opacity var(--d-o, 0.2s), -webkit-transform var(--d-t, 0.3s) var(--d-t-e, ease);
            }

            input[type='checkbox']:checked,
            input[type='radio']:checked {
                --b: var(--active);
                --bc: var(--active);
                --d-o: .3s;
                --d-t: .6s;
                --d-t-e: cubic-bezier(.2, .85, .32, 1.2);
            }

            input[type='checkbox']:disabled,
            input[type='radio']:disabled {
                --b: var(--disabled);
                cursor: not-allowed;
                opacity: .9;
            }

            input[type='checkbox']:disabled:checked,
            input[type='radio']:disabled:checked {
                --b: var(--disabled-inner);
                --bc: var(--border);
            }

            input[type='checkbox']:disabled+label,
            input[type='radio']:disabled+label {
                cursor: not-allowed;
            }

            input[type='checkbox']:hover:not(:checked):not(:disabled),
            input[type='radio']:hover:not(:checked):not(:disabled) {
                --bc: var(--border-hover);
            }

            input[type='checkbox']:focus,
            input[type='radio']:focus {
                box-shadow: 0 0 0 var(--focus);
            }

            input[type='checkbox']:not(.switch),
            input[type='radio']:not(.switch) {
                width: 21px;
            }

            input[type='checkbox']:not(.switch):after,
            input[type='radio']:not(.switch):after {
                opacity: var(--o, 0);
            }

            input[type='checkbox']:not(.switch):checked,
            input[type='radio']:not(.switch):checked {
                --o: 1;
            }

            input[type='checkbox']+label,
            input[type='radio']+label {
                font-size: 14px;
                line-height: 21px;
                display: inline-block;
                vertical-align: top;
                cursor: pointer;
                margin-left: 4px;
            }

            input[type='checkbox']:not(.switch) {
                border-radius: 7px;
            }

            input[type='checkbox']:not(.switch):after {
                width: 5px;
                height: 9px;
                border: 2px solid var(--active-inner);
                border-top: 0;
                border-left: 0;
                left: 7px;
                top: 4px;
                -webkit-transform: rotate(var(--r, 20deg));
                transform: rotate(var(--r, 20deg));
            }

            input[type='checkbox']:not(.switch):checked {
                --r: 43deg;
            }

            input[type='checkbox'].switch {
                width: 38px;
                border-radius: 11px;
            }

            input[type='checkbox'].switch:after {
                left: 2px;
                top: 2px;
                border-radius: 50%;
                width: 15px;
                height: 15px;
                background: var(--ab, var(--border));
                -webkit-transform: translateX(var(--x, 0));
                transform: translateX(var(--x, 0));
            }

            input[type='checkbox'].switch:checked {
                --ab: var(--active-inner);
                --x: 17px;
            }

            input[type='checkbox'].switch:disabled:not(:checked):after {
                opacity: .6;
            }

            input[type='radio'] {
                border-radius: 50%;
            }

            input[type='radio']:after {
                width: 19px;
                height: 19px;
                border-radius: 50%;
                background: var(--active-inner);
                opacity: 0;
                -webkit-transform: scale(var(--s, 0.7));
                transform: scale(var(--s, 0.7));
            }

            input[type='radio']:checked {
                --s: .5;
            }
        }

        /*CHECKBOX AND RADIO CSS ENDS HERE*/


        @media (max-width: 767px) {
            .box {
                padding: 0 40px;

                padding-top: 40px;

                padding-bottom: 40px;
            }

        }

        @media only screen and (orientation: landscape) {

            h1 {

                font-family: 'Roboto Black';

                font-size: 250%;

                text-align: center;


            }

            .con {

                background-color: #ffffff;
                width: 60%;
            }

            .contain {

                width: 65%;

                border-radius: 1px;

                background-color: white;

                padding-left: 13.5%;

                padding-top: 55px;

                padding-bottom: 65px;

                justify-content: center;

            }

        }

        /* OLD 
        @media only screen and (max-width: 600px) {
            .contain {

                width: 60%;

                border-radius: 1px;

                background-color: white;

                padding-left: 20%;

                padding-top: 55px;

                padding-bottom: 65px;

                justify-content: center;

            }
        }


        @media only screen and (max-width: 600px) {

            h1 {

                font-family: 'Roboto Black';

                font-size: 200%;

                text-align: center;


            }

            .contain {

                width: 78%;

                border-radius: 1px;

                background-color: white;

                padding-left: 9.25%;

                padding-top: 55px;

                padding-bottom: 65px;

                justify-content: center;

            }

            .form__field {

                font-family: inherit;

                width: 90%;

                border: 0;

                border-bottom: 1.5px solid #9b9b9b;

                outline: 0;

                font-size: 1.3rem;

                color: black;

                padding: 8px 0;

                background: transparent;

                transition: border-color 0.20s;

                justify-content: center;



            }

            .transparent {
                font-family: inherit;

                width: 65%;

                border: 0;

                border-bottom: 1.5px solid #9b9b9b;

                outline: 0;

                font-size: 1.3rem;

                color: black;

                padding: 8px 0;

                background: transparent;

                transition: border-color 0.20s;

                justify-content: center;




            }

            .dsn {
                width: 340px;
                height: 300px;
                border: white;
                overflow: auto;
                margin: -4.75%;

            }

            .ln {
                border: 0;
                border-bottom: 1.5px solid #9b9b9b;
                width: 90%;
            }

            .note {
                text-align: center;
                font-size: small;
                margin-left: -10%;
            }

        }

        @media only screen and (min-width: 600px) and (max-width: 900px) {

            h1 {

                font-family: 'Roboto Black';

                font-size: 200%;

                text-align: center;


            }

            .contain {

                width: 78%;

                border-radius: 1px;

                background-color: white;

                padding-left: 9.25%;

                padding-top: 55px;

                padding-bottom: 65px;

                justify-content: center;

            }

            .form__field {

                font-family: inherit;

                width: 90%;

                border: 0;

                border-bottom: 1.5px solid #9b9b9b;

                outline: 0;

                font-size: 1.3rem;

                color: black;

                padding: 8px 0;

                background: transparent;

                transition: border-color 0.20s;

                justify-content: center;



            }

            .transparent {
                font-family: inherit;

                width: 65%;

                border: 0;

                border-bottom: 1.5px solid #9b9b9b;

                outline: 0;

                font-size: 1.3rem;

                color: black;

                padding: 8px 0;

                background: transparent;

                transition: border-color 0.20s;

                justify-content: center;




            }

            .dsn {
                width: 340px;
                height: 300px;
                border: white;
                overflow: auto;
                margin: auto;

            }

            .ln {
                border: 0;
                border-bottom: 1.5px solid #9b9b9b;
                width: 100%;
            }

            .note {
                text-align: center;
                font-size: small;
                margin: -10%;
            }

        }


        @media only screen and (orientation: landscape) {

            h1 {

                font-family: 'Roboto Black';

                font-size: 250%;

                text-align: center;


            }

            .con {

                background-color: #ffffff;
                width: 70%;
            }

            .contain {

                width: 65%;

                border-radius: 1px;

                background-color: white;

                padding-left: 13.5%;

                padding-top: 55px;

                padding-bottom: 65px;

                justify-content: center;

            }

            .form__field {

                font-family: inherit;

                width: 112%;

                border: 0;

                border-bottom: 1.5px solid #9b9b9b;

                outline: 0;

                font-size: 1.3rem;

                color: black;

                padding: 8px 0;

                background: transparent;

                transition: border-color 0.20s;

                justify-content: center;



            }

            .dsn {
                width: 340px;
                height: 300px;
                border: white;
                overflow: auto;
                margin: 9%;
            }

            .ln {
                border: 0;
                border-bottom: 1.5px solid #9b9b9b;
                width: 110.5%;
            }

            .note {
                text-align: center;
                font-size: small;
                margin-left: -12px;
            }

        }


        @media only screen and (min-width: 900px) {

            h1 {

                font-family: 'Roboto Black';

                font-size: 200%;

                text-align: center;


            }

            .contain {

                width: 78%;

                border-radius: 1px;

                background-color: white;

                padding-left: 11%;

                padding-top: 55px;

                padding-bottom: 65px;

                justify-content: center;

            }

            .form__field {

                font-family: inherit;

                width: 100%;

                border: 0;

                border-bottom: 1.5px solid #9b9b9b;

                outline: 0;

                font-size: 1.3rem;

                color: black;

                padding: 8px 0;

                background: transparent;

                transition: border-color 0.20s;

                justify-content: center;



            }

            .transparent {
                font-family: inherit;

                width: 85%;

                border: 0;

                border-bottom: 1.5px solid #9b9b9b;

                outline: 0;

                font-size: 1.3rem;

                color: black;

                padding: 8px 0;

                background: transparent;

                transition: border-color 0.20s;

                justify-content: center;




            }

            .dsn {
                width: 340px;
                height: 300px;
                border: white;
                overflow: auto;
                margin: 20%;

            }

            .ln {
                border: 0;
                border-bottom: 1.5px solid #9b9b9b;
                width: 112%;
            }

            .note {
                text-align: center;
                font-size: small;
                margin-left: 0px;
            }

        }

        @media only screen and (width: 1024px) {

            h1 {

                font-family: 'Roboto Black';

                font-size: 200%;

                text-align: center;


            }

            .contain {

                width: 78%;

                border-radius: 1px;

                background-color: white;

                padding-left: 10.5%;

                padding-top: 55px;

                padding-bottom: 65px;

                justify-content: center;

            }

            .form__field {

                font-family: inherit;

                width: 111%;

                border: 0;

                border-bottom: 1.5px solid #9b9b9b;

                outline: 0;

                font-size: 1.3rem;

                color: black;

                padding: 8px 0;

                background: transparent;

                transition: border-color 0.20s;

                justify-content: center;



            }

            .dsn {
                width: 340px;
                height: 300px;
                border: white;
                overflow: auto;
                margin-left: 23.5%;
            }

            .ln {
                border: 0;
                border-bottom: 1.5px solid #9b9b9b;
                width: 111%;
            }

            .note {
                text-align: center;
                font-size: small;
                margin-left: 35px;
            }
        }






        @media only screen and (min-width: 1200px) {
            .con {

                background-color: #ffffff;
                width: 45%;
            }

            .contain {

                width: 80%;

                border-radius: 1px;

                background-color: white;

                padding-left: 10%;

                padding-top: 55px;

                padding-bottom: 65px;

                justify-content: center;

            }

            .form__field {

                font-family: inherit;

                width: 104%;

                border: 0;

                border-bottom: 1.5px solid #9b9b9b;

                outline: 0;

                font-size: 1.3rem;

                color: black;

                padding: 8px 0;

                background: transparent;

                transition: border-color 0.20s;

                justify-content: center;



            }

            .dsn {
                width: 340px;
                height: 300px;
                border: white;
                overflow: auto;
                margin-left: 16.25%;
            }

            .ln {
                border: 0;
                border-bottom: 1.5px solid #9b9b9b;
                width: 104%;
            }

            .note {
                text-align: center;
                font-size: small;
                margin-left: 6.5px;
            }
        }



        @media only screen and (width: 661px) {
            .contain {

                width: 70%;

                border-radius: 1px;

                background-color: white;

                padding-left: 9.5%;

                padding-top: 55px;

                padding-bottom: 65px;

                justify-content: center;

            }

            .form__field {

                font-family: inherit;

                width: 100%;

                border: 0;

                border-bottom: 1.5px solid #9b9b9b;

                outline: 0;

                font-size: 1.3rem;

                color: black;

                padding: 8px 0;

                background: transparent;

                transition: border-color 0.20s;

                justify-content: center;



            }

            .dsn {
                width: 340px;
                height: 300px;
                border: white;
                overflow: auto;
                margin: 0px;
            }

            .ln {
                border: 0;
                border-bottom: 1.5px solid #9b9b9b;
                width: 98.5%;
            }

            .note {
                text-align: center;
                font-size: small;
                margin-left: 0px;
            }

        }


        @media only screen and (width: 1199px) {

            h1 {

                font-family: 'Roboto Black';

                font-size: 200%;

                text-align: center;


            }

            .contain {

                width: 78%;

                border-radius: 1px;

                background-color: white;

                padding-left: 11%;

                padding-top: 55px;

                padding-bottom: 65px;

                justify-content: center;

            }

            .form__field {

                font-family: inherit;

                width: 115.25%;

                border: 0;

                border-bottom: 1.5px solid #9b9b9b;

                outline: 0;

                font-size: 1.3rem;

                color: black;

                padding: 8px 0;

                background: transparent;

                transition: border-color 0.20s;

                justify-content: center;



            }

            .transparent {
                font-family: inherit;

                width: 85%;

                border: 0;

                border-bottom: 1.5px solid #9b9b9b;

                outline: 0;

                font-size: 1.3rem;

                color: black;

                padding: 8px 0;

                background: transparent;

                transition: border-color 0.20s;

                justify-content: center;




            }

            .dsn {
                width: 340px;
                height: 300px;
                border: white;
                overflow: auto;
                margin-left: 27.5%;

            }

            .ln {
                border: 0;
                border-bottom: 1.5px solid #9b9b9b;
                width: 113%;
            }

            .note {
                text-align: center;
                font-size: small;
                margin-left: 70px;
            }

        } */

        /*NEW*/

        @media (max-width: 575.98px) {
            h1 {

                font-family: 'Roboto Black';

                font-size: 200%;

                text-align: center;


            }

            .con {

                background-color: #ffffff;
                width: 85%;
            }

            .contain {

                width: 78%;

                border-radius: 1px;

                background-color: white;

                padding-left: 9.25%;

                padding-top: 55px;

                padding-bottom: 65px;

                justify-content: center;

            }

            .form__field {

                font-family: inherit;

                width: 105%;

                border: 0;

                border-bottom: 1.5px solid #9b9b9b;

                outline: 0;

                font-size: 1.3rem;

                color: black;

                padding: 8px 0;

                background: transparent;

                transition: border-color 0.20s;

                justify-content: center;



            }

            .transparent {
                font-family: inherit;

                width: 85%;

                border: 0;

                border-bottom: 1.5px solid #9b9b9b;

                outline: 0;

                font-size: 1.3rem;

                color: black;

                padding: 8px 0;

                background: transparent;

                transition: border-color 0.20s;

                justify-content: center;




            }

            .dsn {
                width: 102.5%;
                height: 260px;
                border: white;
                overflow: auto;
                margin: auto;

            }

            .ln {
                border: 0;
                border-bottom: 1.5px solid #9b9b9b;
                width: 102.5%;
            }

            .note {
                text-align: center;
                font-size: small;
                margin: auto;
            }

            #addfield a {
                position: fixed;
                right: -200px;
                transition: 0.3s;
                padding-top: 10px;
                padding-bottom: 10px;
                width: 225px;
                height: 350px;
                text-decoration: none;
                font-size: 20px;
                color: white;
                border-radius: 5px 0 0 5px;
                text-align: center;
            }

        }


        @media (min-width: 576px) and (max-width: 767.98px) {
            h1 {

                font-family: 'Roboto Black';

                font-size: 200%;

                text-align: center;


            }

            .contain {

                width: 78%;

                border-radius: 1px;

                background-color: white;

                padding-left: 9.25%;

                padding-top: 55px;

                padding-bottom: 65px;

                justify-content: center;

            }

            .form__field {

                font-family: inherit;

                width: 105%;

                border: 0;

                border-bottom: 1.5px solid #9b9b9b;

                outline: 0;

                font-size: 1.3rem;

                color: black;

                padding: 8px 0;

                background: transparent;

                transition: border-color 0.20s;

                justify-content: center;



            }

            .transparent {
                font-family: inherit;

                width: 85%;

                border: 0;

                border-bottom: 1.5px solid #9b9b9b;

                outline: 0;

                font-size: 1.3rem;

                color: black;

                padding: 8px 0;

                background: transparent;

                transition: border-color 0.20s;

                justify-content: center;




            }

            .dsn {
                width: 103%;
                height: 300px;
                border: white;
                overflow: auto;
                margin: auto;

            }

            .ln {
                border: 0;
                border-bottom: 1.5px solid #9b9b9b;
                width: 103%;
            }

            .note {
                text-align: center;
                font-size: small;
                margin: auto;
            }

            #addfield a {
                position: fixed;
                right: -200px;
                transition: 0.3s;
                padding-top: 10px;
                padding-bottom: 10px;
                width: 250px;
                height: 350px;
                text-decoration: none;
                font-size: 20px;
                color: white;
                border-radius: 5px 0 0 5px;
                text-align: center;
            }


        }



        @media (min-width: 768px) and (max-width: 991.98px) {
            h1 {

                font-family: 'Roboto Black';

                font-size: 200%;

                text-align: center;


            }

            .contain {

                width: 78%;

                border-radius: 1px;

                background-color: white;

                padding-left: 9.25%;

                padding-top: 55px;

                padding-bottom: 65px;

                justify-content: center;

            }

            .form__field {

                font-family: inherit;

                width: 105%;

                border: 0;

                border-bottom: 1.5px solid #9b9b9b;

                outline: 0;

                font-size: 1.3rem;

                color: black;

                padding: 8px 0;

                background: transparent;

                transition: border-color 0.20s;

                justify-content: center;



            }

            .transparent {
                font-family: inherit;

                width: 85%;

                border: 0;

                border-bottom: 1.5px solid #9b9b9b;

                outline: 0;

                font-size: 1.3rem;

                color: black;

                padding: 8px 0;

                background: transparent;

                transition: border-color 0.20s;

                justify-content: center;




            }

            .dsn {
                width: 103%;
                height: 300px;
                border: white;
                overflow: auto;
                margin: auto;

            }

            .ln {
                border: 0;
                border-bottom: 1.5px solid #9b9b9b;
                width: 103%;
            }

            .note {
                text-align: center;
                font-size: small;
                margin: auto;
            }

        }




        @media (min-width: 992px) and (max-width: 1199.98px) {
            h1 {

                font-family: 'Roboto Black';

                font-size: 200%;

                text-align: center;


            }

            .con {

                background-color: #ffffff;
                width: 75%;
            }

            .contain {

                width: 78%;

                border-radius: 1px;

                background-color: white;

                padding-left: 11%;

                padding-top: 55px;

                padding-bottom: 65px;

                justify-content: center;

            }

            .form__field {

                font-family: inherit;

                width: 120%;

                border: 0;

                border-bottom: 1.5px solid #9b9b9b;

                outline: 0;

                font-size: 1.3rem;

                color: black;

                padding: 8px 0;

                background: transparent;

                transition: border-color 0.20s;

                justify-content: center;



            }

            .transparent {
                font-family: inherit;

                width: 85%;

                border: 0;

                border-bottom: 1.5px solid #9b9b9b;

                outline: 0;

                font-size: 1.3rem;

                color: black;

                padding: 8px 0;

                background: transparent;

                transition: border-color 0.20s;

                justify-content: center;




            }

            .dsn {
                width: 120%;
                height: 340px;
                border: white;
                overflow: auto;
                margin: auto;

            }

            .ln {
                border: 0;
                border-bottom: 1.5px solid #9b9b9b;
                width: 120%;
            }

            .note {
                text-align: center;
                font-size: small;
                margin: auto;
            }

            #addfield a {
                position: fixed;
                right: -200px;
                transition: 0.3s;
                padding-top: 10px;
                padding-bottom: 10px;
                width: 275px;
                height: 350px;
                text-decoration: none;
                font-size: 20px;
                color: white;
                border-radius: 5px 0 0 5px;
                text-align: center;
            }

            
        }

        @media (min-width: 1042px) and (max-width: 1066.98) {

            .con {

                background-color: #ffffff;
                width: 72.5%;
            }
        }

        @media (min-width: 1067px) and (max-width: 1119.98px) {

            .con {

                background-color: #ffffff;
                width: 70%;
            }
        }

        @media (min-width: 1120px) and (max-width: 1199.98px) {

            .con {

                background-color: #ffffff;
                width: 65%;
            }
        }

        @media (min-width: 1200px) {
            .con {

                background-color: #ffffff;
                width: 45%;
            }

            .contain {

                width: 80%;

                border-radius: 1px;

                background-color: white;

                padding-left: 10%;

                padding-top: 55px;

                padding-bottom: 65px;

                justify-content: center;

            }

            .form__field {

                font-family: inherit;

                width: 101.5%;

                border: 0;

                border-bottom: 1.5px solid #9b9b9b;

                outline: 0;

                font-size: 1.3rem;

                color: black;

                padding: 8px 0;

                background: transparent;

                transition: border-color 0.20s;

                justify-content: center;



            }

            .dsn {
                width: 101.5%;
                height: 300px;
                border: white;
                overflow: auto;
                margin: auto;
            }

            .ln {
                border: 0;
                border-bottom: 1.5px solid #9b9b9b;
                width: 101.5%;
            }

            .note {
                text-align: center;
                font-size: small;
                margin: auto;
            }



        }

        @media (max-width: 415px) {
            .con {

                background-color: #ffffff;
                width: 100%;
            }

            .form__field {

                font-size: 1rem;
            }

            .transparent {
                font-size: 1rem;

            }

            #addfield a {
                position: fixed;
                right: -200px;
                transition: 0.3s;
                padding-top: 10px;
                padding-bottom: 10px;
                width: 205px;
                height: 350px;
                text-decoration: none;
                font-size: 20px;
                color: white;
                border-radius: 5px 0 0 5px;
                text-align: center;
            }
        }

        @media (max-width: 375px) {
            h1 {

                font-family: 'Roboto Black';

                font-size: 150%;

                text-align: center;


            }

            .form__field {

                width: 103%;

                font-size: 1rem;
            }

            .transparent {

                font-size: 1rem;
            }

            .con {

                background-color: #ffffff;
                width: 90%;
            }
        }


        @media (max-width: 300px) {
            h1 {

                font-family: 'Roboto Black';

                font-size: 125%;

                text-align: center;


            }

            .con {

                background-color: #ffffff;
                width: 100%;
            }


            .form__field {

                font-size: 1rem;
            }

            .transparent {
                font-size: 1rem;

            }


        }
    </style>
    <script type="text/javascript">
        var question_ids = new Array();
        var answer_ids = new Array();
        var text_ids = new Array();
        var textarea_ids = new Array();
        var radio_ids = new Object();
        var radio_ids1 = new Object();
        var checkbox_ids = new Object();
        var checkbox_ids1 = new Object();
        var masterObj = new Object();
        var q_count = 0;


        function randomIdGenerator() {
            return Math.random().toString(36).substring(7);
        }
        function InsertTextBox() {
            q_count += 1;
            var q_id = randomIdGenerator(); var a_id = randomIdGenerator();
            document.getElementById("actual_form").insertAdjacentHTML("beforeend",
                `<div id=${q_count} class="form__group field">
                        <input type="text" id= ${q_id} class="form__field" placeholder="Enter Question Here">
                        <input type="text" id= ${a_id} class="form__field" placeholder="Place for Answer">
                        <button style="padding: 2px 10px;" onclick="return removeThis(${q_id});">X</button>
                    </div>`
            )
            text_ids.push(q_id);
            question_ids.push(q_id);
        }

        function removeThis(id) {
            var tag = id.tagName;
            if (tag === 'TEXTAREA') {
                textarea_ids.splice(textarea_ids.indexOf(id), 1);
            }
            else if (tag === 'INPUT') {
                if (text_ids.includes(id)) {
                    text_ids.splice(text_ids.indexOf(id), 1);
                    question_ids.splice(question_ids.indexOf(id), 1);
                }
                else if (id in checkbox_ids) {
                    let check = checkbox_ids[id];
                    delete checkbox_ids.id;
                    delete checkbox_ids1.check;
                }
                else {
                    let check = radio_ids[id];
                    delete radio_ids.id;
                    delete radio_ids1.check;
                }
            }
            return id.parentNode.remove();
        }


        function InsertTextArea() {
            q_count += 1;
            var q_id = randomIdGenerator(); var a_id = randomIdGenerator();
            document.getElementById("actual_form").insertAdjacentHTML("beforeend",
                `<div id=${q_count} class="form__group field">
                        <textarea type="text" id= ${q_id} class="form__field" placeholder="Enter Question Here"  cols="21.999"></textarea>
                        <textarea type="text" id= ${a_id} class="form__field" placeholder="Place for Answer" cols="21.999"></textarea>
                        <button style="padding: 2px 10px;" onclick="removeThis(${q_id});">X</button>
                    </div>`
            )
            textarea_ids.push(q_id);
            question_ids.push(q_id);
        }

        function Radio() {
            q_count += 1;
            q_id = randomIdGenerator();
            var a_id = randomIdGenerator(); var a2 = randomIdGenerator();
            document.getElementById("actual_form").insertAdjacentHTML("beforeend",
                '<div class="form__group field">\
					    <input type="text" id="'+ q_id + '" class="form__field" placeholder="Enter Question Here">\
                        <input type="radio" name="'+ q_count + '" >\
                        <input type="text" id="'+ a_id + '" class="transparent" placeholder="Place for Answer">\
                        <br>\
                    <input type="button" class="add-btn" id="'+ q_count + '" onclick="Addradio(' + q_count + ' )" value="Add Dropdown Option" style="border: 3px solid #ffffff;background: #4CAF50; border-radius: 2px; height: 30px;color:#ffffff;font-weight:20px;"></input>\
					</div>'
            )
            radio_ids[q_id] = q_count;
            radio_ids1[q_count] = new Array();
            radio_ids1[q_count].push(a_id);
            question_ids.push(q_id);
        }
        function Addradio(q1) {
            var a_id = randomIdGenerator();

            document.getElementById(q1).insertAdjacentHTML("beforeBegin",
                '<div class="form__group field">\
					    <input type="radio" name="'+ q1 + '">\
                        <input type="text" id="'+ a_id + '" class="transparent" placeholder="Place for Answer"><br>\
					</div>'
            )
            q_count += 1;
            radio_ids1[q1].push(a_id);

        }
        function Checkbox() {
            q_count += 1;
            q_id = randomIdGenerator(); var a_id = randomIdGenerator();
            document.getElementById("actual_form").insertAdjacentHTML("beforeend",
                '<div class="form__group field">\
					<input type="text" id="'+ q_id + '" class="form__field" placeholder="Enter Question Here">\
                    <input type="checkbox" name="'+ q_count + '" >\
                        <input type="text" id="'+ a_id + '" class="transparent" placeholder="Place for Answer">\
                        <br>\
                    <input type="button" class="add-btn" id="'+ q_count + '" onclick="Addcheckbox(' + q_count + ')" value="Add Checkbox Option" style="border: 3px solid #ffffff;background: #4CAF50;border-radius: 2px;height: 35px;color:#ffffff;font-weight:20px;"></input>\
					</div>'
            );
            checkbox_ids[q_id] = q_count;
            checkbox_ids1[q_count] = new Array();
            checkbox_ids1[q_count].push(a_id);
            question_ids.push(q_id);
        }
        function Addcheckbox(q1) {
            var a_id = randomIdGenerator();

            document.getElementById(q1).insertAdjacentHTML("beforeBegin",
                '<div class="form__group field">\
				        <input type="checkbox" name="'+ q1 + '">\
                        <input type="text" id="'+ a_id + '" class="transparent" placeholder="Place for Answer">\
				</div>'
            );
            checkbox_ids1[q1].push(a_id);
            q_count += 1;
        }
        function FileDoc() {

            q_count += 1;

            var f_id = randomIdGenerator();

            document.getElementById("actual_form").insertAdjacentHTML("beforeend",

                '<div class="form__group field">\
                        <input type="file" id="'+ f_id + '" class="form__fields" submit.disabled  accept=".pdf,.doc,.docx/*">\
                    </div>'

            )

            question_ids.push(f_id);

        }
        function validForm() {
            var name = document.getElementById("formname").value;
            if (name == "") {
                alert("Form Name must be given");
                return false;
            }
            return true;
        }
        function validFormType() {
            var name = document.getElementById("form_type").value;
            if (name == "") {
                alert("Form Type must be given");
                return false;
            }
            return true;
        }
        function countSubmit() {
            for (var i = 0; i < question_ids.length; i++) {
                var q = question_ids[i];
                var x = (document.getElementById(q).value);
                masterObj[x] = new Array();
                if (text_ids.includes(q)) {
                    masterObj[x].push("text");
                }
                else if (textarea_ids.includes(q)) {
                    masterObj[x].push("textarea");
                }
                else if (q in radio_ids) {
                    masterObj[x].push("radio");
                    for (var j of radio_ids1[radio_ids[q]]) {
                        masterObj[x].push(document.getElementById(j).value);
                    }
                }
                else {
                    masterObj[x].push("checkbox");
                    for (var j of checkbox_ids1[checkbox_ids[q]]) {
                        masterObj[x].push(document.getElementById(j).value);
                    }
                }
            }
            console.log(masterObj.toString());
            var data = JSON.stringify(masterObj);
            document.getElementById("JSON").value = data;
        }

    </script>
</head>

<body id="body" class="body">


    <div id="addfield" class="sidenav">
        <a href="javascript:;" id="add">

            <div class="error-label">

                <div
                    style="font-size: 24px; font-family: 'Roboto'; text-align: center; height: 25px; justify-content: center; text-align: center;text-anchor: middle;">
                    ADD FIELD</div>

                <br>

                <div class="dd-content">

                    <div onclick="InsertTextBox()" style="font-family: 'Roboto';font-size: 18px;">Text Field</div>
                    <br>
                    <br>
                    <div onclick="InsertTextArea()" style="font-family: 'Roboto';font-size: 18px;">Text Area</div>
                    <br>
                    <br>
                    <div onclick="Radio()" style="font-family: 'Roboto';font-size: 18px;">Dropdown</div>
                    <br>
                    <br>
                    <div onclick="Checkbox()" style="font-family: 'Roboto';font-size: 18px;">CheckBox</div>
                    <br>
                    <br>
                    <div onclick="FileDoc()" style="font-family: 'Roboto';font-size: 18px;">File Upload (pdf/doc)</div>


                </div>


            </div>
        </a>

    </div>
    </div>

    <div class="box">

        <div class="con">

            <img src="bg-head-02.JPG">

            <h1 style="font-family: 'Roboto'">DYNAMIC FORM BUILDER</h1>

            <div class="contain">

               <form onsubmit="return validForm() ||  validFormType()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
               <div id="actual_form">
                        <span style="width:100%;text-align: center;">
                            <label class="title font-robo" style="font-size: 16px;">Form Type:<sup
                                    style="color:red;font-size: 14px;"> * </sup></label><input class="ln" type="text"
                                name="form_type" value="" id="form_type" placeholder="Eg. REGISTRATION FORM"></span><br>
                        <br>
                        <span style="width:100%;text-align: center;">
                            <label class="title font-robo" style="font-size: 16px;">Form Name:<sup
                                    style="color:red;font-size: 14px;"> * </sup></label><input class="ln" type="text"
                                id="formname" name="form_name"
                                placeholder="Eg. Sophos KMIT 2020 - Registration"></span><br>
                        <br>
                        <textarea class="dsn title font-robo" style="text-align:inherit;" type="text" name="describe_"
                            value="" id="describe_" placeholder="Enter Description Here"></textarea>


                        <input type="hidden" name="JSON" value="json" id="JSON">
                        <br>
                    </div>
                    <br><br>

                    <button type="submit" class="submit" onvalue="Submit" onclick="countSubmit()">Submit</button>


                    <br><br>

                    <h6 class="note">NOTE: For Email-Ids and Phone Numbers use <font color="blue">"Email"</font> & <font
                            color="blue">"Contact_No"</font> as labels</h6>
                </form>
            </div>

        </div>

    </div>
</body>

</html>