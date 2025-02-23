<?php

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegistrationTest extends WebTestCase
{
    public function testRegistration(): void // Créer un client et récupérer la page d'inscription
    {
        // Créer un client et récupérer la page d'inscription
        $client = static::createClient(); // Crée un client HTTP pour simuler des requêtes
        $client->request('GET', '/register'); // Envoie une requête GET vers l'URL '/register'

        $this->assertResponseIsSuccessful(); // Vérifie que la réponse est réussie (200)
        $this->assertSelectorExists('form'); // Vérifie que le formulaire existe
        $this->assertSelectorTextContains('h1', 'Register'); // Vérifie que le titre contient "Register"
        $this->assertSelectorExists('input[name="registration_form[plainPassword]"]'); // Vérifie que le champ mot de passe existe et que c'est bien un champ de type password
        $this->assertSelectorExists('input[name="registration_form[email]"]'); // Vérifie que le champ email existe et
        $this->assertSelectorExists('input[name="registration_form[agreeTerms]"]'); // Vérifie que le champ agreeTerms existe
        $this->assertSelectorExists('button[type="submit"]'); // Vérifie que le bouton de soumission existe
    }

    public function testRegistrationWithInvalidEmail(): void
    {
        // Créer un client et récupérer la page d'inscription
        $client = static::createClient();
        $client->request('GET', '/register');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('form');
        $this->assertSelectorTextContains('h1', 'Register');
        $this->assertSelectorExists('input[name="registration_form[plainPassword]"]');
        $this->assertSelectorExists('input[name="registration_form[email]"]');
        $this->assertSelectorExists('input[name="registration_form[agreeTerms]"]');
        $this->assertSelectorExists('button[type="submit"]');
    }
}