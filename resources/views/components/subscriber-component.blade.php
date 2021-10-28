<section class="call-to-action">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="main-content">
                <div class="mb-3">
                    <h4>Are You Intrested Our Blogs!</h4>
                    <span>Please Subscribe.</span>
                </div>
                <div class="">
                  <form action="" id="subscriberForm">
                      <div class="form-group">
                          <input class="subscrib-form d-inline-block" type="email" name="email" id="email" placeholder="Type your email address">
                          <button type="submit" class="subscribe-button d-inline-block">Subscribe</button>
                      </div>
                      @error('email')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                      <span id="notificatin" class="text-danger"></span>
                  </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@push('script')
    <script>
    const select = (el) => document.querySelector(el);
    let subscriberForm = select('#subscriberForm')
    let email = select('#email')
    let notificatin = select('#notificatin')
    let url = `${window.location.origin}/subscriber`;

    subscriberForm.addEventListener('submit', async function(e){
            e.preventDefault();
            // console.log(email.value)
            if(email.value){
                try{
                    const response = await axios.post(url,{
                    email : email.value
                    });
                    notificatin.innerHTML = 'Thanks For Subscribe our blog!';
                    email.value = ''
                }catch(err){
                    if(err.response.data.errors.email){
                        notificatin.innerHTML = err.response.data.errors.email[0]
                    }
                }
            }else{
                notificatin.innerHTML = 'Please Enter a Valid Email Address!'
            }
        });
    </script>
@endpush

