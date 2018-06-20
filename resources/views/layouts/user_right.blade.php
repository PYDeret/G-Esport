<div class="col-md-3">
    <div class="side-block">
    <h4 class="block-title">À propos de moi</h4>
    <div class="block-content">
        {{ Auth::user()->about }}
    </div>
    </div>
    <div class="side-block">
    <h4 class="block-title">Location</h4>
    <div class="block-content pt-5">
        <div class="responsive-embed responsive-embed-16x9">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d423284.59051352815!2d-118.41173249999999!3d34.0204989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2z0JvQvtGBLdCQ0L3QtNC20LXQu9C10YEsINCa0LDQu9C40YTQvtGA0L3QuNGPLCDQodCo0JA!5e0!3m2!1sru!2sru!4v1430158354122"
        width="600" height="450"></iframe>
        </div>
    </div>
    </div>
</div>