<?php
?>
<html>
<head>
	<style>
		html,
		body,
		.wrapper {
			height: 100%;
		}

		html,
		body {
			padding: 0;
			margin: 0;
		}

		body {
			font: 1rem / 1.516 'Montserrat', Arial, sans-serif;
		}

		.wrapper {
			position: relative;
			background: url(https://source.unsplash.com/vZlTg_McCDo/1920x1080) no-repeat center center / cover;

		// Dark overlay
  &:before {
			   content: '';
			   position: absolute;
			   top: 0;
			   left: 0;
			   width: 100%;
			   height: 100%;
			   background-color: rgba(33, 33, 33, .25);
		   }
		}

		header,
		.content,
		footer {
			position: absolute;
		}

		header,
		footer {
			width: 100%;
		}

		header {
			top: 0;
			text-align: center;
		}

		.header__logo {
			max-width: 65px;
			fill: #fff;
		}

		.content {
			top: 50%;
			left: 50%;
			text-align: center;
			color: #fff;
			transform: translate(-50%, -50%);

		h1 {
			margin-top: 0;
		}

		form {
			margin: auto;
			display: table;
		}

		input {
			float: left;
			font-size: 16px;
			border: 1px solid #fff;
		}

		input[type=email] {
			padding: 12px;
			background: #fff;
			border-top-left-radius: 4px;
			border-bottom-left-radius: 4px;
		}

		input[type=submit] {
			padding: 12px 24px;
			color: #fff;
			background: transparent;
			border-top-right-radius: 4px;
			border-bottom-right-radius: 4px;
			cursor: pointer;
			transition: all .235s ease-in-out;

		&:hover {
			 color: #212121;
			 background: #fff;
		 }
		}
		}

		.countdown {
			margin: auto;
			display: table;
			font-size: 28px;
			font-weight: 500;

		> div {
			float: left;
			min-width: 80px;
		}

		span {
			position: relative;
			display: block;
			font-size: 16px;
			text-align: center;

		&:before {
			 content: '';
			 position: absolute;
			 top: -2px;
			 right: 0;
			 left: 0;
			 margin-right: auto;
			 margin-left: auto;
			 width: 20px;
			 height: 1px;
			 background: #fff;
		 }
		}
		}

		footer {
			padding-bottom: 12px;
			bottom: 0;
		}

		.footer__links {
			text-align: center;
			list-style-type: none;

		li {
			display: inline-block;

		&:nth-of-type(n+2) {
			 margin-left: 12px;
		 }
		}

		a {
			padding: 8px 0;
			display: block;
			width: 41px;
			text-align: center;
			color: #fff;
			border: 1px solid;
			border-radius: 50%;
			transition: opacity .235s ease-in-out;

		&:hover {
			 opacity: .5;
		 }
		}

		.fa {
			vertical-align: middle;
			font-size: 21px;
		}
		}
	</style>
</head>
<body>
<div class="wrapper">
	<header>
		<svg class="header__logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 318.5 100 125" enable-background="new 0 318.5 100 100"><path d="M88.888 349.937c-.109-.298-.405-.481-.718-.463-5.109.383-11.558.865-18.163 1.358l9.538-12.475c.182-.237.195-.563.033-.814-.162-.25-.46-.376-.756-.307-6.694 1.549-38.692 8.971-43.12 10.304l-6.457-5.539c-.108-.093-.241-.15-.382-.166l-6.908-.774-.053.006-.167.018-.126.032-.044.012-10.098 4.926c-.244.119-.398.366-.398.638 0 .271.155.518.399.637l10.442 5.075.226 3.224.007.024-.001.026 2.333 16.271.012.042.02.066.079.17.033.052.184.169.008.007.019.005.141.066 19.376 5.903 5.754 3.548 1.262 2.943-2.657 14.021c-.04.212.019.431.159.594.135.157.332.247.538.247l.025-.001c.154-.006 15.421-.557 16.007-.572.221-.006.45-.129.579-.308.243-.335.609-.843-4.467-17.763l-.05-.094-.026-.075c-.375-.606-3.278-5.282-4.554-7.092l31.722-23.125c.257-.187.358-.52.249-.816zm-20.773 1.036c-14.051 1.048-28.297 2.104-31.539 2.321l-.293-4.463c3.457-1.007 25.228-6.127 40.94-9.77l-9.108 11.912zm-17.659 29.556l-4.189-2.583 7.808-2.803-3.619 5.386zm-26.808-24.333l10.913-1.279-8.965 14.862-1.948-13.583zm12.112-.522l7.724 21.011-17.23-5.25 9.506-15.761zm-7.272-12.455l6.365 5.46.312 4.74-11.666 1.368-.856-12.224 5.845.656zm-15.092 3.47l7.845-3.827.554 7.909-8.399-4.082zm36.868 51.644l2.459-12.979 7.688-3.065c1.93 6.464 3.891 13.442 4.275 15.528-2.614.09-11.537.412-14.422.516zm2.215-14.407l-1.011-2.36 4.459-6.637c.893 1.301 2.583 3.965 3.894 6.069l-7.342 2.928zm3.106-10.83l-10.522 3.777-8.154-22.182c6.186-.423 39.375-2.906 48.886-3.618l-30.21 22.023z"/></svg>
	</header>

	<main class="content">
		<h1>COMING SOON!</h1>

<!--		<div class="countdown">-->
<!--			<div class="countdown__days">-->
<!--				<div class="number"></div>-->
<!--				<span class>Days</span>-->
<!--			</div>-->
<!---->
<!--			<div class="countdown__hours">-->
<!--				<div class="number"></div>-->
<!--				<span class>Hours</span>-->
<!--			</div>-->
<!---->
<!--			<div class="countdown__minutes">-->
<!--				<div class="number"></div>-->
<!--				<span class>Minutes</span>-->
<!--			</div>-->
<!---->
<!--			<div class="countdown__seconds">-->
<!--				<div class="number"></div>-->
<!--				<span class>Seconds</span>-->
<!--			</div>-->
<!--		</div>-->

		<p>Our website is under construction. We`ll be here soon<br />with our new awesome site</p>

<!--		<form action="">-->
<!--			<input id="form-email" name="form-email" type="email" placeholder="Your email address" />-->
<!--			<input type="submit" value="Notify me" />-->
<!--		</form>-->
	</main>

	<footer>
		<ul class="footer__links">
			<li><a href="#"><span class="fa fa-twitter"></span></a></li>
			<li><a href="#"><span class="fa fa-facebook"></span></a></li>
			<li><a href="#"><span class="fa fa-google-plus"></span></a></li>
			<li><a href="#"><span class="fa fa-github"></span></a></li>
			<li><a href="#"><span class="fa fa-dribbble"></span></a></li>
		</ul>
	</footer>
</div>

<script>
	(() => {
		// Specify the deadline date
		const deadlineDate = new Date('December 31, 2017 23:59:59').getTime();

		// Cache all countdown boxes into consts
		const countdownDays = document.querySelector('.countdown__days .number');
		const countdownHours= document.querySelector('.countdown__hours .number');
		const countdownMinutes= document.querySelector('.countdown__minutes .number');
		const countdownSeconds= document.querySelector('.countdown__seconds .number');

		// Update the count down every 1 second (1000 milliseconds)
		setInterval(() => {
			// Get current date and time
			const currentDate = new Date().getTime();

			// Calculate the distance between current date and time and the deadline date and time
			const distance = deadlineDate - currentDate;

			// Calculations the data for remaining days, hours, minutes and seconds
			const days = Math.floor(distance / (1000 * 60 * 60 * 24));
			const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			const seconds = Math.floor((distance % (1000 * 60)) / 1000);

			// Insert the result data into individual countdown boxes
			countdownDays.innerHTML = days;
			countdownHours.innerHTML = hours;
			countdownMinutes.innerHTML = minutes;
			countdownSeconds.innerHTML = seconds;
		}, 1000);
	})();
</script>
</body>
</html>
