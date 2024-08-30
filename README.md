## 🌟 CFSMA

CFSMAAssocié à CFSMA est une plateforme de cours interactive et captivante, conçue spécifiquement pour les jeunes en formation. Le projet utilise le framework Symfony pour offrir une expérience d'apprentissage enrichie, combinant performance, sécurité, et accessibilité.

** 🚀 Fonctionnalités Principales
** 🎨 Design Réactif : Interface utilisateur moderne, réactive et adaptée à tous les appareils.
** 🎶 Gestion de Contenu : Panneau d'administration pour gérer les cours, utilisateurs, et contenu multimédia.
** 📈 SEO et Performance : Optimisé pour les moteurs de recherche avec des pratiques de performance avancées.
** 🔒 Sécurisé : Conçu avec les meilleures pratiques de sécurité de Symfony.

### 🛠️ Installation et Configuration
Pour démarrer avec ce projet, suivez les étapes ci-dessous pour installer Symfony et configurer votre environnement de développement.

1. Prérequis :
Assurez-vous que votre environnement dispose de :

PHP 8.0 ou supérieur
Composer
Symfony CLI
Un serveur web comme Apache ou Nginx
Node.js et npm
2. Installation de Symfony CLI :
Si Symfony CLI n'est pas encore installé, exécutez la commande suivante :

``` bash
Copier le code
wget https://get.symfony.com/cli/installer -O - | bash
export PATH="$HOME/.symfony/bin:$PATH"
3. Clonez le dépôt du projet :
Clonez ce dépôt dans votre répertoire local :

``` bash
Copier le code
git clone https://github.com/votre-utilisateur/CFSMA.git
cd CFSMA
4. Installez les dépendances :
Utilisez Composer pour installer toutes les dépendances PHP requises :

``` bash
Copier le code
composer install
5. Configurez les variables d'environnement :
Copiez le fichier .env d'exemple et configurez-le selon votre environnement :

``` bash
Copier le code
cp .env.example .env
Modifiez les paramètres de connexion à la base de données et autres variables d'environnement nécessaires.

6. Générez les clés de sécurité de l'application :
Générez une clé secrète pour votre application Symfony :

``` bash
Copier le code
php bin/console security:generate-secret
7. Effectuez les migrations de la base de données :
Créez la base de données et appliquez les migrations :

``` bash
Copier le code
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
8. Lancer le serveur de développement :
Pour démarrer l'application localement, utilisez le serveur de développement Symfony :

``` bash
Copier le code
symfony serve
Votre application sera accessible à l'adresse http://127.0.0.1:8000.

9. Compilation des Assets Frontend :
Si vous avez des fichiers CSS ou JavaScript à compiler, utilisez npm :

``` bash
Copier le code
npm install
npm run dev
