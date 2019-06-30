<article class="feed container">
    <div class="title">
        <h3>Отзывы</h3>
        <p>Proin iaculis purus consequat sem cure. </p>
    </div>
    <?php for ($i = 0; $i < count($feedbacks); $i++): ?>
        <div class="item">
            <div class="img">
                <?php echo $feedbacks[$i]['img'] ?>
                <div class="name">
                    <p><?= $feedbacks[$i]['name'] ?></p>
                </div>
            </div>
            <div class="text">
                <p><?= $feedbacks[$i]['text'] ?></p>
            </div>
        </div>
    <? endfor; ?>
    <div class="item">
        <a href="#">More...</a>
    </div>
</article>
<div class="logos container">
    <img src="public/img/logos/Envato.png" alt="">
    <img src="public/img/logos/WordPress.png" alt="">
    <img src="public/img/logos/Microlancer_copy.png" alt="">
    <img src="public/img/logos/Tuts+.png" alt="">
</div>
<a name="contact"></a>
<form class="contact_us container">
    <div class="title">
        <h3>Contact us</h3>
        <p>Proin iaculis purus consequat sem cure. </p>
    </div>
    <div class="row">
        <div class="item left">
            <input type="text" class="input" placeholder="your Name *" required>
            <input type="text" class="input" placeholder="your e-mail *" required>
            <input type="text" class="input" placeholder="subject" required>
        </div>
        <textarea class="item right" placeholder="Your message *" required></textarea>
    </div>
    <div class="button-block">
        <a href="#" class="button">Send Message</a>
    </div>
</form>
