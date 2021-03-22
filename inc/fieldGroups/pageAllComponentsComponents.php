<?php

use ACFComposer\ACFComposer;
use Flynt\Components;

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'pageAllComponentsComponents',
        'title' => 'Page All Components',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'pageAllComponentsComponents',
                'label' => 'Page All Components',
                'type' => 'flexible_content',
                'button_label' => 'Add Component',
                'layouts' => [
                    Components\HomeHeroSection\getACFLayout(),
                    Components\SoftwareHeroSection\getACFLayout(),
                    Components\TestimonialHeroSection\getACFLayout(),
                    Components\FirmHeroSection\getACFLayout(),
                    Components\SingleIntegrationHeroSection\getACFLayout(),
                    Components\HelpHeroSection\getACFLayout(),
                    Components\PressMediaHeroSection\getACFLayout(),
                    Components\AffiliateHeroSection\getACFLayout(),
                    Components\ContactUsHeroSection\getACFLayout(),

                    Components\HomeFeaturedSection\getACFLayout(),
                    Components\HomeTestimonialsSection\getACFLayout(),
                    Components\SingleTestimonialSection\getACFLayout(),
                    Components\TestimonialListSection\getACFLayout(),

                    Components\IntegrationListSection\getACFLayout(),

                    Components\BlogSearchSection\getACFLayout(),
                    Components\SelectedThreePostsColumnSection\getACFLayout(),
                    Components\ThreePostsColumnByCategorySection\getACFLayout(),
                    Components\ThreePostsRowByCategorySection\getACFLayout(),
                    Components\AllBlogSection\getACFLayout(),
                    Components\PressTestimonialListSection\getACFLayout(),
                    Components\AllPressReleasesSection\getACFLayout(),
                    
                    Components\ThreeColNumberInfoSection\getACFLayout(),
                    Components\BrandAssetsSection\getACFLayout(),
                    Components\ThreeColAffiliateInfoSection\getACFLayout(),
                    Components\ThreeColContactInfoSection\getACFLayout(),
                    
                    Components\AllPracticeAreaSection\getACFLayout(),
                    
                    Components\ThreeExternalLinkColumnSection\getACFLayout(),
                    
                    Components\TwoColListSection\getACFLayout(),
                    Components\TwoTrainersColumnSection\getACFLayout(),
                    
                    Components\ThreeVideosColumnSection\getACFLayout(),

                    Components\BlockImageText\getACFLayout(),
                    Components\BlockTextImageText\getACFLayout(),
                    Components\BlockFullImageText\getACFLayout(),
                    Components\BlockFullImageTitle\getACFLayout(),
                    Components\BlockFitImageText\getACFLayout(),
                    Components\BlockFitImageTitle\getACFLayout(),
                    Components\BlockImage3ColText\getACFLayout(),
                    
                    Components\LearnAboutSection\getACFLayout(),
                    Components\HomeFavoriteSection\getACFLayout(),
                    Components\YoutubeVideoSection\getACFLayout(),
                    Components\OurPlansSection\getACFLayout(),
                    Components\BasicCompanyInfoSection\getACFLayout(),
                    Components\HomeStartTrialSection\getACFLayout(),
                    Components\ChoosePricePlanSection\getACFLayout(),
                    Components\PaymentTableSection\getACFLayout(),
                    Components\PriceTableSection\getACFLayout(),
                    Components\First30Section\getACFLayout(),
                    Components\FaqSection\getACFLayout(),
                    Components\QuestionAnswerSection\getACFLayout(),
                    Components\ContactFormSection\getACFLayout(),

                    Components\TextSection\getACFLayout(),
                ]
            ]
        ],
        'location' => [
            [
                [
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-templates/page-all-components.php'
                ]
            ]
        ]
    ]);
});
