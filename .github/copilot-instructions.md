# Instrucciones para Agentes IA - Tema WordPress Oyanova

Este documento proporciona información esencial para que los agentes de IA trabajen eficientemente en este tema de WordPress.

## Arquitectura General

Este es un tema personalizado de WordPress basado en el tema inicial `_s` (Underscores) con las siguientes características clave:

- **Estructura MVC Modificada**:
  - `/template-parts/`: Componentes reutilizables (vistas)
  - `/inc/`: Funciones auxiliares y personalizaciones
  - Plantillas principales en el directorio raíz

- **Integraciones Principales**:
  - WooCommerce: Personalización completa en `inc/ctm-woo-functions.php`
  - Soporte para eventos personalizados en `single-event.php`

### Configuración del Entorno

1. Instalar dependencias:

```bash
composer install
npm install
```

### Comandos Principales

- Desarrollo de estilos:

```bash
npm run watch     # Observa cambios en SASS
npm run compile:css # Compila SASS a CSS
```

- Validación de código:

```bash
composer lint:wpcs # Verifica estándares PHP
npm run lint:scss  # Verifica estándares SASS
```

### Nomenclatura

- Prefijo `oyanova_` para funciones y hooks personalizados
- Archivos de plantilla: `template-*.php` para páginas personalizadas
- Componentes reutilizables: `/template-parts/content-*.php`

### Estilos

- CSS personalizado en:
  - `assets/css/custom-style.css`: Estilos principales
  - `assets/css/custom-style-2.css`: Estilos adicionales
  - `assets/css/custom-woo.css`: Personalizaciones WooCommerce

### Hooks y Filtros

Los hooks personalizados se definen principalmente en:
- `inc/template-functions.php`: Funcionalidad del tema
- `inc/custom-functions.php`: Funciones personalizadas adicionales

## Puntos de Integración

### WooCommerce

- Personalización de productos en `woocommerce/single-product/`
- Funciones personalizadas en `inc/ctm-woo-functions.php`

### Sistema de Eventos

- Plantilla personalizada: `single-event.php`
- Popup de eventos: `template-parts/content-event-popup.php`

## Mejores Prácticas

1. Utilizar los componentes existentes en `template-parts/` antes de crear nuevos
2. Mantener las personalizaciones de WooCommerce en `inc/ctm-woo-functions.php`
3. Seguir los estándares de codificación de WordPress al agregar nuevo código
4. Documentar nuevas funciones y hooks siguiendo el estilo DocBlock existente