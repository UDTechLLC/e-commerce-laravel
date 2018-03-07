@extends('web.layouts.app')
    @section('title')
    FAQ-@parent
@endsection
@section('content')
    <main class="faq">
        <section class="faq__questions">
            <div class="wrapper">
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>If I order from an international country, will I be charged a customs tax upon receiving my SHEDFAT order?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            The shipping amount that we charge is solely for the shipping method. Each country’s regulations are different so there is a chance that you may get charged duties or custom fees. SHEDFAT is not responsible for any duties or custom fees imposed by the recipient’s country.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>I am unsure how to do a lot of the exercises; do you guys have videos performing these movements?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            We are currently working on a video library that is not available yet. For now the best place to look is youtube or <a href="http://bodybuilding.com" target="_blank">bodybuilding.com</a>
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>If I mess up and have a bad week, can I repeat it before moving onto the next phase?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            You can repeat it on you, but it would still count as a week with me (only under special circumstances will I not count it).
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>If I can’t make it to the gym when I’m out of town are there home workouts you could provide?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            You can follow the challenges on our youtube channel- SHEDFATNOW.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>What do I do if I’m going out of town & can’t pack my meals?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            Pack protein powder with you for a quick meal, make sure you’re still getting all of your water in, If you know you can’t workout then opt to pick meals similar to your meals on low carb days. The eat this not that guide is also available if you need options.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>Do I need to purchase a food scale?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            Yes, definitely.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>What do I need to include in my weekly check ins?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            Pictures (frontal, side, & back) / weight (only weigh yourself in the morning on an empty stomach- after you pee)/ & a summary of your week in regard to workouts/ cardio/ & how well you followed the meal plan.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>Can I still add email support after the 48 hours is up?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            Yes, you can add it at any time during your program, but keep in mind it will only last for the duration of your program (at the end of your 12 weeks).
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>I feel so sore after my workout, what can I do to minimize soreness?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            It’s normal to feel extra sore when you being a new regimen because your body is not used to so much physical activity. Stretching & foam rolling post workout will help a lot.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>What is HIIT & LISS:</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            HIIT = High Intensity Interval Training LISS = Low Intensity Steady State (Cardio).
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>What is Fasted Cardio?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            Cardio performed in the morning on an empty stomach.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>Do I do cardio before or after my work out?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            Always after, unless you’re doing fasted cardio.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>How many times a week am I supposed to do abs?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            At minimum 3/4x a week.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>Can I Add in other exercises that I personally like at the end?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            Yes you may.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>These workouts feel too easy, can I skip to the next phase?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            No, each phase has its’ purpose, if it feels too easy please challenge yourself with heavier weight or less resting time.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>If I can’t workout, can I still have my high carb day?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            Switch it to a low day.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>I like to work out on an empty stomach, can I continue to do this?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            No, at least drink a protein shake if you can’t stomach food but eventually you should work up to eating a full meal.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>Can I switch my meals around?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            Yes, all except meal #1, & #6.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>How often can I have cheat meals?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            Once a week preferably on a high carb day. Eat all of your meals as scheduled until you get to your cheat meal, or if you eat it early in the day continue with the rest of your meals after.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>Can I drink anything other than water?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            Coffee (preferably black), tea (any), & you may add stevia, Splenda, truvia or unsweetened almond milk.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>Can I use Syrups/ Dressings?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            Walden Farms makes sugar, carb free, zero calorie sweetners/ syrup/ dressings. Otherwise just stick to a lite vinaigrette.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>Can I use onions/peppers/ spices to cook?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            Absolutely. With spices you don’t need to cut out sodium completely but please be mindful and look for spices with low sodium.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>How do I incorporate the Recipe Guide into my meal plan?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            You would simply cook the recipe and then measure it out according to the portions that are already in your food plan. i.e. 4oz of Turkey Meatballs instead of 4oz of Chicken.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>Can I eat anything other than pancakes for breakfast?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            You may use ANY of the smoothie or breakfast recipes from the guide to replace meal 1 on any day, because it is your first meal of the day you don’t need to worry about cutting out carbs/fats.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>How do I swap out foods in my meal plan?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            You simply need to refer to the macro breakdowns I’ve provided in the meal plan. Swap carbs for carbs, protein for protein, & fats for other fats.  Veggies are unlimited.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>Is this meal plan for the full 12 weeks or do I get a new one every couple of weeks?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            This is the meal plan for 12 weeks, if we ever need to make changes the amount of the food will change but the food itself will stay the same.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>What if I have a problem with my meal plan. What should I do?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            We stand behind the work we do and want you to be satisfied with your plan. If you are having issues or need an adjustment, please make sure to email your coach or customer service at
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>I do not have a gym membership nor do I own any gym equipment. Will I still be able to follow a custom plan?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            Yes! Our coaches will be able to tailor a program based on what is available to you and whether you like to workout at home, at the gym, or both.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>I follow a vegan diet, will this program work for me?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            Yes! Our coaches are able to tailor a program based off your lifestyle and food preferences. Whether it be vegan, vegetarian, paleo, gluten free, etc just indicate this information on your questionnaire and your coach will be sure to create a plan specific to your needs and lifestyle.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>Are the custom plans available worldwide?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            Yes! No matter where you live we will be able to tailor a program specifically to meet your goals and needs. We have worked with many clients all over the world to help them achieve their health and fitness goals.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>I’m on a tight budget and can’t afford to purchase healthy foods. Will this program work for me?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            Of course it will. Do not believe what they say about healthy eating being expensive. Options such as organic frozen fruits and vegetables, rice, and eggs are affordable staples to fit any budget. In reality you will be saving loads of money following a custom plan.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>I have a busy schedule and don’t have time to cook every day. Will your custom plans still work for me?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            Yes! We totally understand and for that reason we encourage meal prepping. Meal prepping will allow you to bulk cook once a week, which will save you time and keep you on track all week long.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>What age do I have to be in order to purchase a custom plan?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            You must be 18 years or older.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>I submitted my questionnaire, now what?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            Once your questionnaire is submitted, we ask to give us 48-72 business hours in order for us to create your plan. Once your plan is created, you will receive an email with everything you need for the next 12 weeks.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>I purchased a custom plan, now what?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            After purchasing either the 12-week custom Booty Plan, Weight Loss Plan, or Bulking Plan, you will receive a questionnaire in your email that you are required to complete in order for your coach to create a plan tailored to your goals and needs.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>I would like to return my digital product, what should I do?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            Our digital products are considered “used” after receiving the email with your workout link. We have a strict no refund policy specific to dissatisfaction, forgetting to open your file, providing inaccurate email information for the digital product (s), losing access to your email, etc. Please contact info@shedyourfat.com to see how we can resolve any problems you may have with the above.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>Are there any rest days for the workout challenges (30 Day Challenge, Legs on Fire, and/or Absolution)</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            No, these workouts are to be done daily for best results.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>I purchased the 30 Day Challenge, Legs on Fire, and/or Absolution. Will I be receiving a DVD in the mail?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            No, the challenge workouts are online digital products that will be sent to your email as soon as your payment is made. If you are having issues locating the original email sent to you, email
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>I purchased a digital product but do not want to start the program right away. Will my access expire?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            No, you will have access to all purchases forever. Your access will not expire. If you are having issues locating the original email sent to you, email
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>I purchased a digital product and can’t download the link sent to me. What should I do?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            Our digital products (30 Day Challenge, Legs on Fire, and Absolution) are live streaming workouts. You must have internet access/ WIFI to view the workouts. These products cannot be downloaded.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>I purchased a digital product/ e-Book and have not received the link in my email. What should I do?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            Digital products and e-Books will be sent via email as soon as payment is made. They will be sent to the email that is used at the time of checkout. Please make sure to check your spam folder for the links as well. If you are still having trouble locating the email please contact us at <a href="mailto:info@shedyourfat.com">info@shedyourfat.com</a>  with your full name, order number, and email you used at checkout and we will be more than happy to assist you.
                        </p>
                    </div>
                </div>
                <div class="faq__item">
                    <div class="flex flex-a--top">
                        <div class="faq__item-before"></div>
                        <div class="faq__item-question">
                            <span>WHAT IS YOUR RETURN/ REFUND POLICY?</span>
                        </div>
                    </div>
                    <div class="faq__item-answer">
                        <p>
                            We stand behind the work we do and services we provide for our clients and want you to be satisfied with your purchase. If you are having issues or need an adjustment to your custom plan, please make sure to email your coach or customer service at <a href="mailto:info@shedyourfat.com">info@shedyourfat.com</a>  and we will be more than happy to assist you. We have a strict non-refundable policy when it comes to custom plans.
                        </p>
                        <p>
                            Our digital products are considered “used” after receiving the email with your workout link. We have a strict no refund policy specific to dissatisfaction, forgetting to open your file, providing inaccurate email information for the digital product (s), losing access to your email, etc. Please contact info@shedyourfat.com to see how we can resolve any problems you may have with the above.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection