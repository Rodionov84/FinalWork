<ul class="cd-faq-categories">
        @include('menu.categories')
        <li><a href="#add_form">Связаться с нами</a></li>
</ul> <!-- cd-faq-categories -->

<div class="cd-faq-items">
        @include('questions_list.categories')
        <section class="cd-faq-question" id="add_form">
        @include('add_question.form')
        </section>
</div> <!-- cd-faq-items -->