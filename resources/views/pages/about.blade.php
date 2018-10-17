@extends('layouts.app')

@section('content')
<h1><?php echo $title; ?></h1>
<p class="lead">This is a simple CMS Web Application, built for <a href="https://www.duminex.com/">Duminex.com</a> as an assignment solution, by <a href="http://ahmadwkhan.com">Ahmad W Khan.</a> The application was built in 2 days.</p>

<p class="lead">Following was the requirement of the app : </p>

<pre>
	
	دٌف : ساخت یک وةلاگ ساده ة هٌراه یک CMS
	Goal : Build a simple blog with a CMS
	وةلاگ صانل ةخش اٌی زیر نی ةاصد
	The blog contains the following sections
	1. کارةران صانل س ىوع کارةر ةا نا یٌت ندیرسایت، ىویسيدگان و کارةران نی ةاصد
	1. Users include three types of users with the type of the administrator, authors and users
	الف - ندیر : کيترل کانل سایت
	a - Administrator: Full site control
	ب - ىویسيدگان : فقط انکان ویرایش و ثتت نطالب، ثتت و ویرایش دست اٌی نطالب، ثتت و
	ویرایش ةرچسب اٌی نطالب
	b - Authors: Only the ability to edit and add contents, register and edit categories, register and edit tags
	ج - کارةران : فقط انکان ثتت ىام و ویرایش پروفایل خود را دارىد
	c - Users: can only register and edit their profile
	تهام کارةران دارای ایو فیلد اٌ نی ةاصيد ىام، تاریخ تولد، ایهیل و صهاره تلفو نی ةاصيد و
	هٌچيیو یک سیستم سطح دسترسی وجود داصت ةاصد ک ةتوان در آن ىقش اٌ را تعریف کرد
	All users have these fields: name, date of birth, email and phone number, and there is also an access level system that can define roles .
	2. نطالب ک صانل فیلد اٌی تصویر ىوصت ،ً عيوان ىوصت ،ً نتو ىوصت ،ً چکیده و تاریخ ایجاد و
	ثتت نی ةاصيد
	2. Content that includes the image fields, the title , the text of the article, the abstract and the date of creation and registration
	رٌ نطلب نی تواىد یک دست داصت ةاصد
	Each content can have a category
	رٌ ىوصت نی تواىد چيد ةرچسب داصت ةاصد
	Each content can have one or more tags
	3. دست ةيدی نطالب صانل فیلد اٌی ىام ةاصد
	3. Category content include names fields
	4. ةرچسب فقط صانل ىام ةاصد
	4. The tag only contains the name
	5. تيظیهات سایت فقط صانل فیلد اٌی ىام سایت، لوگو و فوتر نی ةاصد
	5. Site settings only include site name, logo and font
	6. ةخضی ةرای تعییو سطح دسترسی ةاصد
	6. Part to determine the level of access
	ةرىان لازم ىیست گرافیک فوق العاده ایی داصت ةاصد انا راةط نياستی داصت ةاصد و ساده و زیتا
	ةاصد ةیضتر تهرکز روی انکاىات ةاصد
	The program does not need to have a great graphics, but it's a good interface and it's simple
	.and beautiful to focus more on features

</pre>

<p class="lead">About me : </p>

<p>I am a Full-Stack Web Developer with over 1 year experience of building end-to-end production apps using PHP, Laravel, CodeIgniter, JavaScript, jQuery, Bootstrap etc. I love learning new technology that allows me to solve problems more quickly and efficiently. When I am not coding, you can find me listening to podcasts, audiobooks or reading eBooks. </p>

@endsection
