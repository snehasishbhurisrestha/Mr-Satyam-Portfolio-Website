@extends('layouts.web-app')

@section('title','Home')

@section('body-class', 'home-page')

@section('css')
<style>
	 .contact-link {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            font-size: 22px;
            font-weight: bold;
            color: black;
            transition: transform 0.3s ease-in-out;
        }

        /* WhatsApp Icon (Pulse Effect to Simulate Incoming Messages) */
        .whatsapp i {
            color: #25D366;
            /* font-size: 50px; */
			/* margin-left: 10px; */
            animation: pulse 1.5s infinite ease-in-out;
        }

        /* @keyframes pulse {
            0% { transform: scale(1); text-shadow: 0px 0px 0px #25D366; }
            50% { transform: scale(1.2); text-shadow: 0px 0px 10px #25D366; }
            100% { transform: scale(1); text-shadow: 0px 0px 0px #25D366; }
        } */

        /* Email Icon (Tap Forward Effect to Simulate Sending) */
        .email i {
            color: #0078D4;
            /* font-size: 35px; */
            position: relative;
            animation: sendTap 1.5s infinite ease-in-out;
        }

        /* @keyframes sendTap {
            0% { transform: translateX(0px); }
            50% { transform: translateX(5px); }
            100% { transform: translateX(0px); }
        } */
</style>
<!-- Fancybox CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
@endsection

@section('content')
<div class="pagepiling">
	<div data-anchor="home" class="pp-scrollable text-white section section-1 pp-easing">
		<div class="scroll-wrap banner">
			<div class="section-bg desktop-only">
				@if (!is_null($banner))
				<img src="{{ $banner->getFirstMediaUrl('banner-laptop') }}" loading="lazy">
				@else
				<img src="{{ asset('assets/site-asset/images/bg/home.jpg') }}" loading="lazy">
				@endif
			</div>
			<div class="section-bg mobile-only" >
				@if (!is_null($banner))
				<img src="{{ $banner->getFirstMediaUrl('banner-mobile') }}" loading="lazy">
				@else
				<img src="{{ asset('assets/site-asset/images/bg/home-mobile.jpg') }}" loading="lazy">
				@endif
			</div>
			<div class="scrollable-content">
				<div class="vertical-centred">
					<div class="boxed boxed-inner">
						<div class="boxed">
							<div class="container">
								<div class="intro">
									<div class="row">
										<div class="col-md-8 col-lg-6">
											<a data-fancybox href="https://youtu.be/X5fvN7bOtyA?si=qZLge2kbaKUDJSeo" class="video" style="margin: 0 0 30px 0;"><i class="icon ion-ios-play"></i></a> {{-- target="_blank" --}}
											{{-- <div id="videoContainer" style="margin-top:20px;"></div> --}}
											<p class="subtitle-top" style="margin: 0 !important;">Graphic Media Designer </p>
											<h1 class="display-2 text-white">Mr Satyam <span>.</span></h1>
											<a href="#contact" class="theme-btn">Let's Connect <i class="icon ion-arrow-up-a"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
  	</div>

	<div data-anchor="about" class="pp-scrollable section section-2">
		<div class="scroll-wrap">
			<div class="scrollable-content">
				<div class="vertical-centred">
					<div class="boxed boxed-inner">
						<div class="vertical-title text-dark hidden-xs hidden-sm"><span>what I do</span></div>
						<div class="boxed">
							<div class="container">
								<div class="intro">
									<div class="row">
										<div class="col-md-5 col-lg-4">
											<div class="border-box">
												<h1 class="display-2 text-white big-font">5 <span></span></h1>
												<h4 class="">Years<br> Experience<br> Working</h4>
											</div>
										</div>
										<div class="col-md-6 col-lg-6 col-lg-offset-2 ">
											<div class="main-text" id="selector">
												<h1 class="ah-headline ld-gradient-heading">
													My
													<span class="ah-words-wrapper">
														<b class="is-visible">Experience</b>
														<b>經驗</b>
														<b>अनुभव</b>
														<b>Experiencia</b>
														<b>অভিজ্ঞতা</b>
														<b>Опыт</b>
														<b>ہبرجت<</b>
														<b>Deneyim</b>
													</span>
												</h1>
											</div>
											<div class="ce_ixelgen_progress_bar block">
												<div class="progress_bar">
													<div class="progress_bar_item grid-x">
														<div class="item_label cell auto">Graphic Design</div>
														<div class="item_value cell shrink">0%</div>
														<div class="item_bar cell"><div class="progress" data-progress="90"></div></div>
													</div>
													<div class="progress_bar_item grid-x">
														<div class="item_label cell auto">Motion Graphics & Animation</div>
														<div class="item_value cell shrink">0%</div>
														<div class="item_bar cell"><div class="progress" data-progress="95"></div></div>
													</div>
													<div class="progress_bar_item grid-x">
														<div class="item_label cell auto">CGI Ads making</div>
														<div class="item_value cell shrink">0%</div>
														<div class="item_bar cell"><div class="progress" data-progress="80"></div></div>
													</div>
													<div class="progress_bar_item grid-x">
														<div class="item_label cell auto">Creative Problem-Solving</div>
														<div class="item_value cell shrink">0%</div>
														<div class="item_bar cell"><div class="progress" data-progress="85"></div></div>
													</div>
													<div class="progress_bar_item grid-x">
														<div class="item_label cell auto">UI/UX Design</div>
														<div class="item_value cell shrink">0%</div>
														<div class="item_bar cell"><div class="progress" data-progress="80"></div></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div data-anchor="projects" class="pp-scrollable text-white section section-3" style="overflow-x: hidden;">
		
		<section class="mil-dark-bg">
			<div class="mi-invert-fix">
				<div class="mil-animation-frame">
					<div class="mil-animation mil-position-1 mil-scale" data-value-1="2.4" data-value-2="1.4" style="top: 300px; right: -100px; translate: none; rotate: none; scale: none; transform: translate3d(0px, 0px, 0px) scale(1.9262, 1.9262);"><div class="mil-dodecahedron">
						<div class="mil-pentagon">
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
						</div>
						<div class="mil-pentagon">
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
						</div>
						<div class="mil-pentagon">
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
						</div>
						<div class="mil-pentagon">
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
						</div>
						<div class="mil-pentagon">
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
						</div>
						<div class="mil-pentagon">
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
						</div>
						<div class="mil-pentagon">
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
						</div>
						<div class="mil-pentagon">
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
						</div>
						<div class="mil-pentagon">
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
						</div>
						<div class="mil-pentagon">
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
						</div>
						<div class="mil-pentagon">
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
						</div>
						<div class="mil-pentagon">
							<div></div>
							<div></div>
							<div></div>
							<div></div>
							<div></div>
						</div>
					</div>
				</div>
				<div class="mil-animation mil-position-2 mil-scale" data-value-1="2" data-value-2="1" style="left: 150px; translate: none; rotate: none; scale: none; transform: translate3d(0px, 0px, 0px) scale(1.2193, 1.2193);"><div class="mil-dodecahedron">
					<div class="mil-pentagon">
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
					</div>
					<div class="mil-pentagon">
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
					</div>
					<div class="mil-pentagon">
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
					</div>
					<div class="mil-pentagon">
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
					</div>
					<div class="mil-pentagon">
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
					</div>
					<div class="mil-pentagon">
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
					</div>
					<div class="mil-pentagon">
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
					</div>
					<div class="mil-pentagon">
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
					</div>
					<div class="mil-pentagon">
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
					</div>
					<div class="mil-pentagon">
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
					</div>
					<div class="mil-pentagon">
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
					</div>
					<div class="mil-pentagon">
						<div></div>
						<div></div>
						<div></div>
						<div></div>
						<div></div>
					</div>
					</div></div>
				</div>
				<div class="container mil-p-120-0">

					<div class="mil-mb-120">
						<div class="row">
							<div class="col-lg-10">

								<span class="mil-suptitle mil-light-soft mil-suptitle-right mil-up" style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">Professionals focused on helping your brand<br> grow and move forward.</span>

							</div>
						</div>

						<div class="mil-complex-text justify-content-center mil-up mil-mb-15" style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">

							<span class="mil-text-image"><img loading="lazy" src="{{ asset('assets/site-asset/images/bg/home.jpg') }}" alt="team"></span>
							<h2 class="mil-h1 mil-muted mil-center" style="margin: 0;">Unique <span class="mil-thin">Ideas</span></h2>

						</div>
						<div class="mil-complex-text justify-content-center mil-up" style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;">

							<h2 class="mil-h1 mil-muted mil-center" style="margin: 0;">For Your <span class="mil-thin">Business.</span></h2>
							{{-- <a href="#contact" class="mil-services-button mil-button mil-arrow-place"><span>What we do</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="mil-arrow">
								<path d="M 14 5.3417969 C 13.744125 5.3417969 13.487969 5.4412187 13.292969 5.6367188 L 13.207031 5.7226562 C 12.816031 6.1136563 12.816031 6.7467188 13.207031 7.1367188 L 17.070312 11 L 4 11 C 3.448 11 3 11.448 3 12 C 3 12.552 3.448 13 4 13 L 17.070312 13 L 13.207031 16.863281 C 12.816031 17.254281 12.816031 17.887344 13.207031 18.277344 L 13.292969 18.363281 C 13.683969 18.754281 14.317031 18.754281 14.707031 18.363281 L 20.363281 12.707031 C 20.754281 12.316031 20.754281 11.682969 20.363281 11.292969 L 14.707031 5.6367188 C 14.511531 5.4412187 14.255875 5.3417969 14 5.3417969 z"></path>
							</svg></a> --}}
							<a href="#contact" class="mil-services-button mil-button mil-arrow-place"><span>Contact</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="mil-arrow">
								<path d="M 14 5.3417969 C 13.744125 5.3417969 13.487969 5.4412187 13.292969 5.6367188 L 13.207031 5.7226562 C 12.816031 6.1136563 12.816031 6.7467188 13.207031 7.1367188 L 17.070312 11 L 4 11 C 3.448 11 3 11.448 3 12 C 3 12.552 3.448 13 4 13 L 17.070312 13 L 13.207031 16.863281 C 12.816031 17.254281 12.816031 17.887344 13.207031 18.277344 L 13.292969 18.363281 C 13.683969 18.754281 14.317031 18.754281 14.707031 18.363281 L 20.363281 12.707031 C 20.754281 12.316031 20.754281 11.682969 20.363281 11.292969 L 14.707031 5.6367188 C 14.511531 5.4412187 14.255875 5.3417969 14 5.3417969 z"></path>
							</svg></a>

						</div>
					</div>

					<div class="row mil-services-grid m-0">
						<div class="col-md-6 col-lg-3 mil-services-grid-item p-0">

							<a href="{{ route('project.grapic-design') }}" class="mil-service-card-sm mil-up" style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;text-decoration: none;">
								<h5 class="mil-muted mil-mb-30">Graphic Designing</h5>
								<p class="mil-light-soft mil-mb-30">Stunning designs, strong branding, creative layouts, visual impact, unique and professional aesthetics.</p>
								<div class="mil-button mil-icon-button-sm mil-arrow-place"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="mil-arrow">
									<path d="M 14 5.3417969 C 13.744125 5.3417969 13.487969 5.4412187 13.292969 5.6367188 L 13.207031 5.7226562 C 12.816031 6.1136563 12.816031 6.7467188 13.207031 7.1367188 L 17.070312 11 L 4 11 C 3.448 11 3 11.448 3 12 C 3 12.552 3.448 13 4 13 L 17.070312 13 L 13.207031 16.863281 C 12.816031 17.254281 12.816031 17.887344 13.207031 18.277344 L 13.292969 18.363281 C 13.683969 18.754281 14.317031 18.754281 14.707031 18.363281 L 20.363281 12.707031 C 20.754281 12.316031 20.754281 11.682969 20.363281 11.292969 L 14.707031 5.6367188 C 14.511531 5.4412187 14.255875 5.3417969 14 5.3417969 z"></path>
								</svg></div>
							</a>

						</div>
						<div class="col-md-6 col-lg-3 mil-services-grid-item p-0">

							<a href="{{ route('project.video-production') }}" class="mil-service-card-sm mil-up" style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;text-decoration: none;">
								<h5 class="mil-muted mil-mb-30">Video Production</h5>
								<p class="mil-light-soft mil-mb-30">High-quality shoots, cinematic storytelling, seamless editing, professional visuals, engaging content creation.</p>
								<div class="mil-button mil-icon-button-sm mil-arrow-place"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="mil-arrow">
									<path d="M 14 5.3417969 C 13.744125 5.3417969 13.487969 5.4412187 13.292969 5.6367188 L 13.207031 5.7226562 C 12.816031 6.1136563 12.816031 6.7467188 13.207031 7.1367188 L 17.070312 11 L 4 11 C 3.448 11 3 11.448 3 12 C 3 12.552 3.448 13 4 13 L 17.070312 13 L 13.207031 16.863281 C 12.816031 17.254281 12.816031 17.887344 13.207031 18.277344 L 13.292969 18.363281 C 13.683969 18.754281 14.317031 18.754281 14.707031 18.363281 L 20.363281 12.707031 C 20.754281 12.316031 20.754281 11.682969 20.363281 11.292969 L 14.707031 5.6367188 C 14.511531 5.4412187 14.255875 5.3417969 14 5.3417969 z"></path>
								</svg></div>
							</a>
						</div>
						<div class="col-md-6 col-lg-3 mil-services-grid-item p-0">

							<a href="{{ route('project.motion-graphic') }}" class="mil-service-card-sm mil-up" style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;text-decoration: none;">
								<h5 class="mil-muted mil-mb-30">Motion Graphic</h5>
								<p class="mil-light-soft mil-mb-30">Smooth animations, dynamic transitions, visually appealing effects, motion storytelling, enhancing brand presence.</p>
								<div class="mil-button mil-icon-button-sm mil-arrow-place"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="mil-arrow">
									<path d="M 14 5.3417969 C 13.744125 5.3417969 13.487969 5.4412187 13.292969 5.6367188 L 13.207031 5.7226562 C 12.816031 6.1136563 12.816031 6.7467188 13.207031 7.1367188 L 17.070312 11 L 4 11 C 3.448 11 3 11.448 3 12 C 3 12.552 3.448 13 4 13 L 17.070312 13 L 13.207031 16.863281 C 12.816031 17.254281 12.816031 17.887344 13.207031 18.277344 L 13.292969 18.363281 C 13.683969 18.754281 14.317031 18.754281 14.707031 18.363281 L 20.363281 12.707031 C 20.754281 12.316031 20.754281 11.682969 20.363281 11.292969 L 14.707031 5.6367188 C 14.511531 5.4412187 14.255875 5.3417969 14 5.3417969 z"></path>
								</svg></div>
							</a>

						</div>
						<div class="col-md-6 col-lg-3 mil-services-grid-item p-0">

							<a href="{{ route('project.cgi') }}" class="mil-service-card-sm mil-up" style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px); opacity: 1;text-decoration: none;">
								<h5 class="mil-muted mil-mb-30">CGI & VFX</h5>
								<p class="mil-light-soft mil-mb-30">Realistic 3D visuals, immersive effects, detailed animations, bringing imagination to life with precision.</p>
								<div class="mil-button mil-icon-button-sm mil-arrow-place"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="mil-arrow">
									<path d="M 14 5.3417969 C 13.744125 5.3417969 13.487969 5.4412187 13.292969 5.6367188 L 13.207031 5.7226562 C 12.816031 6.1136563 12.816031 6.7467188 13.207031 7.1367188 L 17.070312 11 L 4 11 C 3.448 11 3 11.448 3 12 C 3 12.552 3.448 13 4 13 L 17.070312 13 L 13.207031 16.863281 C 12.816031 17.254281 12.816031 17.887344 13.207031 18.277344 L 13.292969 18.363281 C 13.683969 18.754281 14.317031 18.754281 14.707031 18.363281 L 20.363281 12.707031 C 20.754281 12.316031 20.754281 11.682969 20.363281 11.292969 L 14.707031 5.6367188 C 14.511531 5.4412187 14.255875 5.3417969 14 5.3417969 z"></path>
								</svg></div>
							</a>

						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	@if($testimonials->isNotEmpty())
	<div data-anchor="testimonial" class="pp-scrollable text-white section section-4">
		<div class="scroll-wrap">
		<div class="section-bg" ></div>
		<div class="scrollable-content">
			<div class="vertical-centred">
			<div class="boxed boxed-inner testimonial">
				<div class="boxed">
				<div class="container">
					<div class="sun"><img loading="lazy" src="https://cdn-icons-png.flaticon.com/512/9758/9758374.png"></div>
					<div class="floating-element" style="top: 20%; left: 30%;">
					<img loading="lazy" src="https://cdn-icons-png.flaticon.com/512/1791/1791311.png " width="256" height="256" alt="" title="" class="img-small">
					</div> 
					<div class="intro">
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="text-center testimonial-title">
								<h2 class="title-uppercase mb-0">Design Success Stories {{--<span>Stories</span>--}}</h2>
								<p>Transforming visions into impactful realities. Hear how our designs have made a difference</p>
							</div>
							<div class="slick-slider">
								@foreach ($testimonials as $testimonial)
								<div class="slide">
									<div class="testi-item">
										<img src="{{ $testimonial->getFirstMediaUrl('testimonial-image') }}" alt="" loading="lazy" class="img-responsive" />
										<p>{!! $testimonial->description !!}</p>
										<ul>
											{{-- <li><i class="icon ion-star"></i></li>
											<li><i class="icon ion-star"></i></li>
											<li><i class="icon ion-star"></i></li>
											<li><i class="icon ion-star"></i></li>
											<li><i class="icon ion-star"></i></li> --}}
											@for($i=0;$i<$testimonial->rating;$i++)
											<li><i class="icon ion-star"></i></li>
											@endfor
											{{-- @for($j=$i;$j<5;$j++)
												<i class="fas fa-star"></i>
											@endfor --}}
										</ul>
										<h4>{{ $testimonial->name }} <span>{{ $testimonial->address }}</span></h4>
									</div>
								</div>
								@endforeach
								{{-- <div class="slide">
									<div class="testi-item">
										<img src="https://randomuser.me/api/portraits/women/2.jpg" alt="" class="img-responsive" />
										<p>Amazing work delivered with clear communication and dedication! Vibhu truly impressed me, and I’ll definitely be hiring him again.</p>
										<ul>
											<li><i class="icon ion-star"></i></li>
											<li><i class="icon ion-star"></i></li>
											<li><i class="icon ion-star"></i></li>
											<li><i class="icon ion-star"></i></li>
											<li><i class="icon ion-star"></i></li>
										</ul>
										<h4>Viktor S. <span>Newcastle, Australia</span></h4>
									</div>
								</div>
								<div class="slide">
									<div class="testi-item">
										<img src="https://randomuser.me/api/portraits/women/3.jpg" alt="" class="img-responsive" />
										<p>Amazing work delivered with clear communication and dedication! Vibhu truly impressed me, and I’ll definitely be hiring him again.</p>
										<ul>
											<li><i class="icon ion-star"></i></li>
											<li><i class="icon ion-star"></i></li>
											<li><i class="icon ion-star"></i></li>
											<li><i class="icon ion-star"></i></li>
											<li><i class="icon ion-star"></i></li>
										</ul>
										<h4>Viktor S. <span>Newcastle, Australia</span></h4>
									</div>
								</div>
								<div class="slide">
									<div class="testi-item">
										<img src="https://randomuser.me/api/portraits/women/4.jpg" alt="" class="img-responsive" />
										<p>Amazing work delivered with clear communication and dedication! Vibhu truly impressed me, and I’ll definitely be hiring him again.</p>
										<ul>
											<li><i class="icon ion-star"></i></li>
											<li><i class="icon ion-star"></i></li>
											<li><i class="icon ion-star"></i></li>
											<li><i class="icon ion-star"></i></li>
											<li><i class="icon ion-star"></i></li>
										</ul>
										<h4>Viktor S. <span>Newcastle, Australia</span></h4>
									</div>
								</div>
								<div class="slide">
									<div class="testi-item">
										<img src="https://randomuser.me/api/portraits/women/5.jpg" alt="" class="img-responsive" />
										<p>Amazing work delivered with clear communication and dedication! Vibhu truly impressed me, and I’ll definitely be hiring him again.</p>
										<ul>
											<li><i class="icon ion-star"></i></li>
											<li><i class="icon ion-star"></i></li>
											<li><i class="icon ion-star"></i></li>
											<li><i class="icon ion-star"></i></li>
											<li><i class="icon ion-star"></i></li>
										</ul>
										<h4>Viktor S. <span>Newcastle, Australia</span></h4>
									</div>
								</div> --}}
							</div>
						</div>
					</div>
					</div>
				</div>
				</div>
			</div>
			</div>
		</div>
		</div>
	</div>
	@endif

	{{-- <div data-anchor="clients" class="pp-scrollable section section-5">
		<div class="scroll-wrap">
		<div class="scrollable-content">
			<div class="vertical-centred">
			<div class="boxed boxed-inner">
				<div class="boxed">
				<div class="container">
					<div class="intro overflow-hidden">
					<div class="row">
						<div class="col-md-12">
						<h2 class="title-uppercase mb-0">Worked With</h2>
						<div class="row-partners">
							<div class="col-partner">
							<div class="partner-inner"><img alt="" src="{{ asset('assets/site-asset/images/partners/1.png') }}" style="height: 80px;"></div>
							</div>
							<div class="col-partner">
							<div class="partner-inner"><img alt="" src="{{ asset('assets/site-asset/images/partners/2.png') }}" style="height: 280px;"></div>
							</div>
							<div class="col-partner">
							<div class="partner-inner"><img alt="" src="{{ asset('assets/site-asset/images/partners/3.png') }}" style="height: 180px;"></div>
							</div>
							<div class="col-partner">
							<div class="partner-inner"><img alt="" src="{{ asset('assets/site-asset/images/partners/4.png') }}" style="height: 180px;"></div>
							</div>
							<div class="col-partner">
							<div class="partner-inner"><img alt="" src="{{ asset('assets/site-asset/images/partners/5.png') }}" style="height: 180px;"></div>
							</div>
							<div class="col-partner">
							<div class="partner-inner"><img alt="" src="{{ asset('assets/site-asset/images/partners/6.png') }}" style="height: 180px;"></div>
							</div>
							<div class="col-partner">
							<div class="partner-inner"><img alt="" src="{{ asset('assets/site-asset/images/partners/7.png') }}" style="height: 180px;"></div>
							</div>
						</div>
						</div>
					</div>
					</div>
				</div>
				</div>
			</div>
			</div>
		</div>
		</div>
	</div> --}}

	<div data-anchor="clients" class="pp-scrollable section section-5">
		<div class="scroll-wrap banner">
			<div class="section-bg desktop-only">
				<img loading="lazy" src="@if (!is_null($client)) {{ $client->getFirstMediaUrl('our-client-laptop') ?? '' }} @endif">
			</div>
			<div class="section-bg mobile-only" >
				<img loading="lazy" src="@if (!is_null($client)) {{ $client->getFirstMediaUrl('our-client-mobile') ?? '' }} @endif">
			</div>
		</div>
	</div>

	{{-- <div data-anchor="contact" class="pp-scrollable section section-7">
		<div class="scroll-wrap">
		
			<div class="scrollable-content">
				<div class="vertical-centred contact">
				<div class="boxed boxed-inner">
					<div class="boxed">
					<div class="container">
						<div class="intro overflow-hidden">
						<!-- <div class="row">
							<div class="col-lg-4">
							<h2 class="title-uppercase">Contact</h2>
								<p>You’ll called for yieding male, so lights Stars abundantly, is their.</p>
								<a href=""><h3>27 Queen St, New York USA</h3></a>
								<a href=""><h3>+7 (212) 674-25-10</h3></a>
								<p>gilber.design@gmail.com</p>
							</div>
							<div class="col-lg-2">
							</div>
							<div class="col-lg-6 ">
							<h4>Let's grab a coffee and jump on conversation <span>chat with me.</span></h4>
							<div class="contact-info">
								<form class="js-form" novalidate="novalidate">
								<div class="row">
									<div class="form-group col-sm-12">
									<input type="text" name="name" required="" placeholder="Your Name*" aria-required="true">
									</div>
									<div class="form-group col-sm-12">
									<input type="email" name="email" placeholder="Your Email">
									</div>
									<div class="form-group col-sm-12">
									<textarea name="message" required="" placeholder="Message*" aria-required="true"></textarea>
									</div>
									<div class="col-sm-12"><button type="submit" class="btn">Post Comment</button></div>
								</div>
								</form>
							</div>
							</div>
						</div> -->
						<div class="row">
							<div class="col-md-4">
								<div class="pricing-box panel p-2 md:p-3 lg:p-4 xl:p-5 vstack items-start rounded-1-5 lg:rounded-2 border border-dark dark:border-white dark:border-opacity-15 text-dark dark:text-white dark:bg-gradient-45 from-tertiary-600 to-transparent">
									<div class="hstack items-start justify-between gap-2">
										<div>
											<div class="vstack items-start gap-1">
												<span class="pricing-box-title fw-medium py-narrow px-2 bg-dark text-white dark:bg-primary dark:text-dark rounded-pill">Basic</span>
												<p class="pricing-box-desc opacity-70">Free now and forever</p>
											</div>
										</div>
										<div>
											<div class="pricing-box-price">
												<h4 class="price h2 fw-normal m-0 text-inherit"><sup class="fs-4 mt-n4">$</sup>0</h4>
											</div>
										</div>
									</div>
									<hr>
									<ul class="nav-y gap-1 fs-6">
										<li class="mb-1"><b>Standout features</b></li>
										<li><i class="icon icon-narrow unicon-checkmark fw-bold ltr:me-1 rtl:ms-1"></i> Fast and Reliable</li>
										<li><i class="icon icon-narrow unicon-checkmark fw-bold ltr:me-1 rtl:ms-1"></i> Discover Data Everywhere</li>
										<li><i class="icon icon-narrow unicon-checkmark fw-bold ltr:me-1 rtl:ms-1"></i> Enrich Data with Context</li>
										<li><i class="icon icon-narrow unicon-checkmark fw-bold ltr:me-1 rtl:ms-1"></i> Risk Management</li>
									</ul>
									<div class="pricing-box-cta vstack gap-1 justify-center text-center mt-4">
										<a class="btn btn-md btn-ghost-tertiary border border-dark dark:border-white dark:border-opacity-15 rounded-pill" href="/html/lexend/main/sign-up">Buy Now</a>
										<span class="fs-7 opacity-70">No credit card required!</span>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="pricing-box panel p-2 md:p-3 lg:p-4 xl:p-5 vstack items-start rounded-1-5 lg:rounded-2 border border-dark dark:border-primary text-dark dark:text-white dark:bg-gradient-45 from-tertiary-600 to-transparent">
									<div class="hstack items-start justify-between gap-2">
										<div>
											<div class="vstack items-start gap-1">
												<span class="pricing-box-title  fw-medium py-narrow px-2 bg-dark text-white dark:bg-primary dark:text-dark rounded-pill">Growth </span>
												<p class="pricing-box-desc opacity-70">One month only</p>
											</div>
										</div>
										<div>
											<div class="pricing-box-price">
												<h4 class="price h2 fw-normal m-0 text-inherit"><sup class="fs-4 mt-n4">$</sup>24</h4>
											</div>
										</div>
									</div>
									<hr>
									<ul class="nav-y gap-1 fs-6">
										<li class="mb-1"><b>Standout features</b></li>
										<li><i class="icon icon-narrow unicon-checkmark fw-bold ltr:me-1 rtl:ms-1"></i> Fast and Reliable</li>
										<li><i class="icon icon-narrow unicon-checkmark fw-bold ltr:me-1 rtl:ms-1"></i> Discover Data Everywhere</li>
										<li><i class="icon icon-narrow unicon-checkmark fw-bold ltr:me-1 rtl:ms-1"></i> Enrich Data with Context</li>
										<li><i class="icon icon-narrow unicon-checkmark fw-bold ltr:me-1 rtl:ms-1"></i> Risk Management</li>
										<li><i class="icon icon-narrow unicon-checkmark fw-bold ltr:me-1 rtl:ms-1"></i> Privacy Compliance</li>
										<li><i class="icon icon-narrow unicon-checkmark fw-bold ltr:me-1 rtl:ms-1"></i> Third-Party Management</li>
									</ul>
									<div class="pricing-box-cta vstack gap-1 justify-center text-center mt-4">
										<a class="btn btn-md btn-primary border border-dark dark:border-white dark:border-opacity-15 rounded-pill" href="/html/lexend/main/sign-up">Buy Now</a>
										<span class="fs-7 opacity-70">No credit card required!</span>
									</div>
									</div>
							</div>
							<div class="col-md-4">
								<div class="pricing-box panel p-2 md:p-3 lg:p-4 xl:p-5 vstack items-start rounded-1-5 lg:rounded-2 border border-dark dark:border-white dark:border-opacity-15 text-dark dark:text-white dark:bg-gradient-45 from-tertiary-600 to-transparent">
									<div class="hstack items-start justify-between gap-2">
										<div>
											<div class="vstack items-start gap-1">
												<span class="pricing-box-title  fw-medium py-narrow px-2 bg-dark text-white dark:bg-primary dark:text-dark rounded-pill">Custom Plan</span>
												<p class="pricing-box-desc opacity-70">Free now and forever</p>
											</div>
										</div>
										<div>
											<div class="pricing-box-price">
												<h4 class="price h2 fw-normal m-0 text-inherit"><sup class="fs-4 mt-n4">$</sup>0</h4>
											</div>
										</div>
									</div>
									<hr>
									<ul class="nav-y gap-1 fs-6">
										<li class="mb-1"><b>Standout features</b></li>
										<li><i class="icon icon-narrow unicon-checkmark fw-bold ltr:me-1 rtl:ms-1"></i> Fast and Reliable</li>
										<li><i class="icon icon-narrow unicon-checkmark fw-bold ltr:me-1 rtl:ms-1"></i> Discover Data Everywhere</li>
										<li><i class="icon icon-narrow unicon-checkmark fw-bold ltr:me-1 rtl:ms-1"></i> Enrich Data with Context</li>
										<li><i class="icon icon-narrow unicon-checkmark fw-bold ltr:me-1 rtl:ms-1"></i> Risk Management</li>
									</ul>
									<div class="pricing-box-cta vstack gap-1 justify-center text-center mt-4">
										<a class="btn " href="/html/lexend/main/sign-up">Buy Now</a>
										<span class="fs-7 opacity-70">No credit card required!</span>
									</div>
								</div>
							</div>
						</div>
						</div>
						<div class="row">
							<div class="col-12 mt-5">
								<!-- Calendly Section -->
								<iframe 
									src="https://calendly.com/gmdsatyam/mr-satyam?month=2025-01" 
									frameborder="0" 
									style="width: 100%; height: 100vh; border: none; border-radius: 12px;">
								</iframe>
							</div>
						</div>
					</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div> --}}

	{{-- <div data-anchor="store" class="pp-scrollable section section-7">
		<div class="scroll-wrap">
			<div class="scrollable-content">
				<div class="vertical-centred contact">
					<div class="boxed boxed-inner">
						<div class="boxed">
							<div class="container">
								<div class="row">
									@foreach($products as $product)
									<div class="col-lg-3 col-md-6 col-sm-6">
										<div class="as_product_box">
											<div class="as_product_img">
												<a href="">
													<img src="{{ getProductMainImage($product->id) }}" alt="" class="img-responsive">
												</a>
												<ul>
													<li><a href="javascript:void(0);" id="add-to-cart-btn" data-product-id="{{ $product->id }}"><img src="{{ asset('site_asset/images/svg/cart.svg') }}" alt=""><span>Add To Card</span></a></li>
												</ul>
											</div> 
											<span><img src="{{ asset('site_asset/images/rating.png') }}" alt=""></span>
											<h4 class="as_subheading"><a href="">{{ $product->name }}</a></h4>
											<span class="as_price">₹{{ $product->total_price }} <del>₹{{ $product->price }}</del> <span class="as_orange">(60% off)</span></span>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> --}}

	@if($blogs->isNotEmpty())
	<div data-anchor="blogs" class="pp-scrollable section section-6">
		<div class="scroll-wrap">
			<div class="section-bg"></div>
			<div class="scrollable-content">
				<div class="vertical-centred contact">
					<div class="boxed boxed-inner">
						<div class="boxed">
							<div class="container">
								<div class="intro overflow-hidden">
									<h2 class="title-uppercase">Recent news</h2>
									<div class="row">
										@foreach ($blogs as $blog)
										<div class="col-md-4">
											<article class="vlt-post vlt-post--masonry post-52 post type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized tag-follow tag-photography">
												<div class="vlt-post-border">
													<span class="top"></span>
													<span class="right"></span>
													<span class="bottom"></span>
													<span class="left"></span>
												</div>
												<div class="vlt-post-media">
													<img decoding="async"  src="{{ $blog->getFirstMediaUrl('blog-image') }}" class="attachment-gilber-800x600 size-gilber-800x600 wp-post-image" alt="" loading="lazy" srcset="{{ $blog->getFirstMediaUrl('blog-image') }} 800w, {{ asset('assets/site-asset/images/single-post-03-300x162.jpg') }} 300w, {{ $blog->getFirstMediaUrl('blog-image') }} 1024w, {{ $blog->getFirstMediaUrl('blog-image') }} 768w, {{ $blog->getFirstMediaUrl('blog-image') }} 1110w" sizes="(max-width: 800px) 100vw, 800px" />
												</div>
												<div class="vlt-post-content">
													<header class="vlt-post-header">
														<div class="vlt-post-meta">
															<span>
																<time datetime="2020-12-10T09:54:09+00:00">{{ format_date($blog->publish_date) }}</time>
															</span>
														</div>
														<h3 class="vlt-post-title">
															<a href="{{ route('blog.details',$blog->slug) }}">{{ $blog->title }}</a>
														</h3>
													</header>
													<div class="vlt-post-excerpt"> {!! truncateBlogDescription($blog->description) !!}</div>
													<footer class="vlt-post-footer">
														<a class="vlt-read-more-link" href="{{ route('blog.details',$blog->slug) }}">Read More <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 8">
															<defs></defs>
																<path d="M15.3536 4.35355c.1952-.19526.1952-.51184 0-.7071L12.1716.464466c-.1953-.195262-.5119-.195262-.7071 0-.1953.195262-.1953.511845 0 .707104L14.2929 4l-2.8284 2.82843c-.1953.19526-.1953.51184 0 .7071.1952.19527.5118.19527.7071 0l3.182-3.18198zM0 4.5h15v-1H0v1z" fill="currentColor"></path>
															</svg>
														</a>
													</footer>
												</div>
											</article>
										</div>
										@endforeach
										{{-- <div class="col-md-4">
											<article class="vlt-post vlt-post--masonry post-52 post type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized tag-follow tag-photography">
														<div class="vlt-post-border">
														<span class="top"></span>
														<span class="right"></span>
														<span class="bottom"></span>
														<span class="left"></span>
														</div>
														<div class="vlt-post-media">
														<img decoding="async"  src="{{ asset('assets/site-asset/images/news/2.jpg') }}" class="attachment-gilber-800x600 size-gilber-800x600 wp-post-image" alt="" loading="lazy" srcset="{{ asset('assets/site-asset/images/news/2.jpg') }} 800w, {{ asset('assets/site-asset/images/news/2.jpg') }} 300w, {{ asset('assets/site-asset/images/news/2.jpg') }} 1024w, {{ asset('assets/site-asset/images/news/2.jpg') }} 768w, {{ asset('assets/site-asset/images/news/2.jpg') }} 1110w" sizes="(max-width: 800px) 100vw, 800px" />
														</div>
														<div class="vlt-post-content">
														<header class="vlt-post-header">
															<div class="vlt-post-meta">
															<span>
																<time datetime="2020-12-10T09:54:09+00:00">December 10, 2020</time>
															</span>
															</div>
															<h3 class="vlt-post-title">
															<a href="#">Secrets of the Serpents</a>
															</h3>
														</header>
														<div class="vlt-post-excerpt"> Beast creature days. This response is important for our ability to learn from mistakes, but it alsogives rise to ...</div>
														<footer class="vlt-post-footer">
															<a class="vlt-read-more-link" href="#">Read More <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 8">
																<defs></defs>
																<path d="M15.3536 4.35355c.1952-.19526.1952-.51184 0-.7071L12.1716.464466c-.1953-.195262-.5119-.195262-.7071 0-.1953.195262-.1953.511845 0 .707104L14.2929 4l-2.8284 2.82843c-.1953.19526-.1953.51184 0 .7071.1952.19527.5118.19527.7071 0l3.182-3.18198zM0 4.5h15v-1H0v1z" fill="currentColor"></path>
															</svg>
															</a>
														</footer>
														</div>
													</article>
										</div>
										<div class="col-md-4">
											<article class="vlt-post vlt-post--masonry post-52 post type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized tag-follow tag-photography">
														<div class="vlt-post-border">
														<span class="top"></span>
														<span class="right"></span>
														<span class="bottom"></span>
														<span class="left"></span>
														</div>
														<div class="vlt-post-media">
														<img decoding="async"  src="{{ asset('assets/site-asset/images/news/3.jpg') }}" class="attachment-gilber-800x600 size-gilber-800x600 wp-post-image" alt="" loading="lazy" srcset="{{ asset('assets/site-asset/images/news/3.jpg') }} 800w, {{ asset('assets/site-asset/images/news/3.jpg') }} 300w, {{ asset('assets/site-asset/images/news/3.jpg') }} 1024w, {{ asset('assets/site-asset/images/news/3.jpg') }} 768w, {{ asset('assets/site-asset/images/news/3.jpg') }} 1110w" sizes="(max-width: 800px) 100vw, 800px" />
														</div>
														<div class="vlt-post-content">
														<header class="vlt-post-header">
															<div class="vlt-post-meta">
															<span>
																<time datetime="2020-12-10T09:54:09+00:00">December 10, 2020</time>
															</span>
															</div>
															<h3 class="vlt-post-title">
															<a href="#">Secrets of the Serpents</a>
															</h3>
														</header>
														<div class="vlt-post-excerpt"> Beast creature days. This response is important for our ability to learn from mistakes, but it alsogives rise to ...</div>
														<footer class="vlt-post-footer">
															<a class="vlt-read-more-link" href="#">Read More <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 8">
																<defs></defs>
																<path d="M15.3536 4.35355c.1952-.19526.1952-.51184 0-.7071L12.1716.464466c-.1953-.195262-.5119-.195262-.7071 0-.1953.195262-.1953.511845 0 .707104L14.2929 4l-2.8284 2.82843c-.1953.19526-.1953.51184 0 .7071.1952.19527.5118.19527.7071 0l3.182-3.18198zM0 4.5h15v-1H0v1z" fill="currentColor"></path>
															</svg>
															</a>
														</footer>
														</div>
													</article>
										</div> --}}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endif

	<div data-anchor="contact" class="pp-scrollable section section-7">
		<div class="scroll-wrap">
			<div class="scrollable-content">
				<div class="vertical-centred contact">
					<div class="boxed boxed-inner">
						<div class="boxed">
							<div class="container">
								<div class="intro overflow-hidden">
									<div class="row">
										<div class="col-lg-4">
											<h2 class="title-uppercase">Contact</h2>
											<p><h4>Reach us <span style="color: #9bd500;">Anytime</span>, because connecting with you is our <span style="color: #9bd500;">Priority</span>!</h4></p>
											{{-- <a href=""><h3>27 Queen St, New York USA</h3></a> --}}
											{{-- <a href="https://wa.me/+919339562668/?text=Hi"><h3>+91 9339562668</h3></a>
											<p><a href="mailto:contact@mrsatyam.com"><h3>contact@mrsatyam.com</h3></a></p> --}}
											<a href="https://wa.me/+919339562668/?text=Hi" class="contact-link whatsapp">
												<h3><i class="fab fa-whatsapp me-3"></i> +91 9339562668</h3>
											</a>
									
											<a href="mailto:satyam@mrsatyam.com" class="contact-link email">
												<h3><i class="fas fa-envelope"></i> satyam@mrsatyam.com</h3>
											</a>
										</div>
										<div class="col-lg-2">
										</div>
										<div class="col-lg-6 ">
											<h4>Let's grab a coffee and jump on conversation <span>chat with me.</span></h4>
											<div class="contact-info">
												<form id="contactForm" class="js-form" novalidate="novalidate">
													@csrf
													<div class="row">
														<div class="form-group col-sm-12">
															<input type="text" name="name" required="" placeholder="Your Name*" aria-required="true">
														</div>
														<div class="form-group col-sm-12">
															<input type="email" name="email" placeholder="Your Email*" required>
														</div>
														<div class="form-group col-sm-12">
															<input type="tel" name="phone" placeholder="Your Phone*" maxlength="10" minlength="10" pattern="[0-9]{10}" required>
														</div>
														<div class="form-group col-sm-12">
															<textarea name="message" placeholder="Message" aria-required="true"></textarea>
														</div>
														<div class="col-sm-12"><button type="submit" class="btn">Contact Me</button></div>
													</div>
												</form>
											</div>
										</div>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection   

@section('script')
<!-- Fancybox JS -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
<script>
    $(document).ready(function () {
		function validateEmail(email) {
			const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
			return emailPattern.test(email);
		}

        $('#contactForm').on('submit', function (e) {
            e.preventDefault();

            const formData = $(this).serialize();
			const form = $(this);
			const submitButton = form.find('button[type="submit"]');
			const name = form.find('input[name="name"]').val().trim();
			const email = form.find('input[name="email"]').val().trim();

			if (!name) {
				showToast('error', 'Validation Error', 'Name is required!');
				return;
			}

			if (!email || !validateEmail(email)) {
				showToast('error', 'Validation Error', 'Valid email is required!');
				return;
			}

            $.ajax({
                url: "{{ route('contact.store') }}",
                type: "POST",
                data: formData,
				beforeSend: function () {
					submitButton.prop('disabled', true).text('Sending...');
				},
                success: function (response) {
					$('#contactForm')[0].reset();
					showToast('success', 'Success', 'Message sent successfully!');
					submitButton.prop('disabled', false).text('Contact Me');
				},
                error: function (xhr) {
					showToast('error', 'Error', 'There was an error. Please try again.');
                }
            });
        });
    });
</script>
<script>
	Fancybox.bind("[data-fancybox]", {
	  Youtube: {
		autoplay: true,
	  },
	});
</script>
@endsection