# Routing

## Componentes a usar en las demos

```bash
$ composer require doctrine/annotations
$ composer require --dev symfony/maker-bundle
```

馃摎**Documentaci贸n** [https://symfony.com/doc/current/routing.html](https://symfony.com/doc/current/routing.html)

## 馃攳 Depuraci贸n de rutas

Esta opci贸n nos permite **depurar** el sistema de enrutado aportando informaci贸n sobre la ejecuci贸n real del framework.

- Listado de las todas las rutas: `php bin/console debug:router`
- Informaci贸n sobre una ruta espec铆fica: `php bin/console debug:router <route-name>`, por ejemplo `php bin/console debug:router article_show`
- Testear una URL: `php bin/console router:match <relative-url>`, por ejemplo `php bin/console router:match /blog/my鈥恖atest鈥恜ost`

## Restricciones

### Matching HTTP Methods

```php
/**
 * @Route("/api/posts/{id}", methods={"GET","HEAD"})
 */
public function show(int $id): Response
{
// ... return a JSON response with the post
}
```
```php
#[Route('/api/posts/{id}', methods: ['GET', 'HEAD'])]
public function show(int $id): Response
{
// ... return a JSON response with the post
}
```

### Sub-Domain Routing

```php
/**
 * @Route("/", name="mobile_homepage", host="m.example.com")
 */
public function mobileHomepage(): Response
{
  // ...
}
```
```php
#[Route('/', name: 'mobile_homepage', host: 'm.example.com')]
public function mobileHomepage(): Response
{
  // ...
}
```
```php
/**
 * @Route(
 * "/",
 * name="mobile_homepage",
 * host="{subdomain}.example.com",
 * defaults={"subdomain"="m"},
 * requirements={"subdomain"="m|mobile"}
 * )
 */
public function mobileHomepage(): Response
{
// ...
}
```
```php
#[Route(
  '/',
  name: 'mobile_homepage',
  host: '{subdomain}.example.com',
  defaults: ['subdomain' => 'm'],
  requirements: ['subdomain' => 'm|mobile'],
)]
public function mobileHomepage(): Response
{
// ...
}
```

### Localized Routes (i18n)

```php
/**
 * @Route({
 * "en": "/about-us",
 * "nl": "/over-ons"
 * }, name="about_us")
 */
public function about(): Response
{
// ...
}
```
```php
#[Route(path: [
  'en' => '/about-us',
  'nl' => '/over-ons'
], name: 'about_us')]
public function about(): Response
{
// ...
}
```