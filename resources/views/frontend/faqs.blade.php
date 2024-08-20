@extends('frontend.layouts.main')
@section('title', 'FAQs')
@section('main-container')
<!-- Breadcrumb -->
<div class="breadcrumb-area" style="background: linear-gradient(rgba(0, 38, 153, 0.8) 100%, rgba(0, 38, 153, 0.8) 100%), url({{url('frontend/images/breadcrumb/faq.png')}});">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-info text-center">
                    <h1 class="text-white">FAQs</h1>
                    <p class="text-white "><a href="{{url('/')}}">Home</a><i class="far fa-chevron-double-right"></i> FAQs</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- FAQ -->
<div class="faq-dark pt-120 pb-120">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="section-title text-center">
					<span>Do you have any questions?</span>
					<h2>If you have to know anything you can ask</h2>
				</div>
			</div>
		</div>
		<div class="row mt-60">

			<div class="col-lg-12">
				<div class="accordion faq-wrap faq-wrap-page" id="accordionExample">
					@foreach ($faqs as $faq)
                    <div class="accordion-item mb-4">
						<h2 class="accordion-header" id="heading{{$faq->id}}">
							<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$faq->id}}" aria-expanded="true" aria-controls="collapse{{$faq->id}}">
								Q. {{$faq->question}}
							</button>
						</h2>
						<div id="collapse{{$faq->id}}" class="accordion-collapse collapse {{ $faq->id == 1 ? 'show' : '' }}" aria-labelledby="heading{{$faq->id}}" data-bs-parent="#accordionExample">
							<div class="accordion-body">
								{{$faq->answer}}
							</div>
						</div>
					</div>
                    @endforeach
				</div>
			</div>
			<div class="col-lg-12 mt-4">
                <div>
                    {{$faqs->links('pagination::bootstrap-5')}}
                </div>

			</div>
		</div>
	</div>
</div>
<!-- FAQ End -->
@endsection
