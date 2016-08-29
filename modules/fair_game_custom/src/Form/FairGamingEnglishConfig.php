<?php

namespace Drupal\fair_game_custom\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides OAuth configuration options.
 */

class FairGamingEnglishConfig extends ConfigFormBase {

  /**
   * Constructs a \Drupal\system\ConfigFormBase object.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The factory for configuration objects.
   */
  public function __construct(ConfigFactoryInterface $config_factory) {
    parent::__construct($config_factory);
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {

    return 'fair_game_config_id';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['fair_game_custom.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    //$config = $this->config('twitter_search_block.settings');
    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t(' Page Title'),
      '#required' => TRUE,
      '#default_value' => $config->get('english_title'),
      '#placeholder' => $this->t('PAGE TITLE *'),
    ];
    $form['body'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Body'),
      '#required' => TRUE,
      '#default_value' => $config->get('english_body'),
      '#placeholder' => $this->t('BODY *'),
    ];
    $form['language'] = [
      '#type' => 'markup',
      '#title' => $this->t('Language'),
      '#value' => $config->get('english_language'),
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];
    return $form;
  }

  /**
   * Saving OAuth credentials in configuration.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

     $config = \Drupal::service('config.factory')->getEditable('fair_game_custom.settings');
    // $config->set('oauth_access_token', $form_state->getValue('oauth_access_token'))->save();
    // $config->set('oauth_access_token_secret', $form_state->getValue('oauth_access_token_secret'))->save();
    // $config->set('consumer_key', $form_state->getValue('consumer_key'))->save();
    // $config->set('consumer_secret', $form_state->getValue('consumer_secret'))->save();
    // $config->set('api_version', $form_state->getValue('api_version'))->save();
    // parent::submitForm($form, $form_state);
  }

}
