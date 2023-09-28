<h4> Share yours ideas </h4>
<div class="row">
    <form action="{{ route('ideas.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="form-control" id="content" rows="3"></textarea>
            @error('content')
                <span class="d-block fs-6 mt-2 text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> Share </button>
        </div>
    </form>
</div>

{{--
    == ways to define action in form ==
    Direct => action="/post" method="POST"
    with URL => action="{{ url('/post') }}" method="POST"
    named Route => action="{{ route('post') }}" method="POST"

    == @csrf ==
    Cross-Site Request Forgery (CSRF) attacks are a type of malicious exploit whereby unauthorized commands are performed on behalf of an authenticated user. Laravel automatically generates a CSRF "token" for each active user session managed by the application. This token is used to verify that the authenticated user is the one actually making the requests to the application. Anytime you define a HTML form in your application, you should include a hidden CSRF token field in the form so that the CSRF protection middleware can validate the request. You may use the @csrf Blade directive to generate the token field:

--}}
