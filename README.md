# API Localități din România

[![E2E Tests](https://img.shields.io/github/actions/workflow/status/peviitor-ro/orase/api-tests.yml?branch=main&label=E2E-Tests)](https://github.com/peviitor-ro/orase/actions/workflows/api-tests.yml)
[![ALBA](https://img.shields.io/github/actions/workflow/status/peviitor-ro/orase/alba-tests.yml?branch=main&label=ALBA)](https://github.com/peviitor-ro/orase/actions/workflows/alba-tests.yml)
[![ARAD](https://img.shields.io/github/actions/workflow/status/peviitor-ro/orase/arad-tests.yml?branch=main&label=ARAD)](https://github.com/peviitor-ro/orase/actions/workflows/arad-tests.yml)
[![ARGES](https://img.shields.io/github/actions/workflow/status/peviitor-ro/orase/arges-tests.yml?branch=main&label=ARGES)](https://github.com/peviitor-ro/orase/actions/workflows/arges-tests.yml)
[![BACAU](https://img.shields.io/github/actions/workflow/status/peviitor-ro/orase/bacau-tests.yml?branch=main&label=BACAU)](https://github.com/peviitor-ro/orase/actions/workflows/bacau-tests.yml)
[![BIHOR](https://img.shields.io/github/actions/workflow/status/peviitor-ro/orase/bihor-tests.yml?branch=main&label=BIHOR)](https://github.com/peviitor-ro/orase/actions/workflows/bihor-tests.yml)
[![BISTRITA-NASAUD](https://img.shields.io/github/actions/workflow/status/peviitor-ro/orase/bistrita-nasaud-tests.yml?branch=main&label=BISTRITA-NASAUD)](https://github.com/peviitor-ro/orase/actions/workflows/bistrita-nasaud-tests.yml)

Un API public care oferă informații despre toate localitățile din România: comune, municipii, orașe și sate.

## 🌐 Endpoint-uri

### Accesare generală

| Metodă | URL | Descriere |
|--------|-----|-----------|
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/` | Toate localitățile din România |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/judete/` | Lista tuturor judetelor din România |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/` | Lista completă cu toate judetele |

### Accesare pe judete

Fiecare judet poate fi accesat individual folosind următorul format:

```
https://orase.peviitor.ro/ROMANIA/{JUDET}/
```

| Metodă | Endpoint |
|--------|----------|
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/BUCURESTI/](https://orase.peviitor.ro/ROMANIA/BUCURESTI/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/ALBA/](https://orase.peviitor.ro/ROMANIA/ALBA/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/ARAD/](https://orase.peviitor.ro/ROMANIA/ARAD/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/ARGES/](https://orase.peviitor.ro/ROMANIA/ARGES/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/BACAU/](https://orase.peviitor.ro/ROMANIA/BACAU/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/BIHOR/](https://orase.peviitor.ro/ROMANIA/BIHOR/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/BISTRITA-NASAUD/](https://orase.peviitor.ro/ROMANIA/BISTRITA-NASAUD/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/BOTOSANI/](https://orase.peviitor.ro/ROMANIA/BOTOSANI/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/BRAILA/](https://orase.peviitor.ro/ROMANIA/BRAILA/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/BRASOV/](https://orase.peviitor.ro/ROMANIA/BRASOV/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/BUZAU/](https://orase.peviitor.ro/ROMANIA/BUZAU/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/CALARASI/](https://orase.peviitor.ro/ROMANIA/CALARASI/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/CARAS-SEVERIN/](https://orase.peviitor.ro/ROMANIA/CARAS-SEVERIN/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/CLUJ/](https://orase.peviitor.ro/ROMANIA/CLUJ/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/CONSTANTA/](https://orase.peviitor.ro/ROMANIA/CONSTANTA/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/COVASNA/](https://orase.peviitor.ro/ROMANIA/COVASNA/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/DAMBOVITA/](https://orase.peviitor.ro/ROMANIA/DAMBOVITA/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/DOLJ/](https://orase.peviitor.ro/ROMANIA/DOLJ/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/GALATI/](https://orase.peviitor.ro/ROMANIA/GALATI/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/GIURGIU/](https://orase.peviitor.ro/ROMANIA/GIURGIU/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/GORJ/](https://orase.peviitor.ro/ROMANIA/GORJ/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/HARGHITA/](https://orase.peviitor.ro/ROMANIA/HARGHITA/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/HUNEDOARA/](https://orase.peviitor.ro/ROMANIA/HUNEDOARA/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/IALOMITA/](https://orase.peviitor.ro/ROMANIA/IALOMITA/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/IASI/](https://orase.peviitor.ro/ROMANIA/IASI/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/ILFOV/](https://orase.peviitor.ro/ROMANIA/ILFOV/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/MARAMURES/](https://orase.peviitor.ro/ROMANIA/MARAMURES/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/MEHEDINTI/](https://orase.peviitor.ro/ROMANIA/MEHEDINTI/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/MURES/](https://orase.peviitor.ro/ROMANIA/MURES/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/NEAMT/](https://orase.peviitor.ro/ROMANIA/NEAMT/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/OLT/](https://orase.peviitor.ro/ROMANIA/OLT/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/PRAHOVA/](https://orase.peviitor.ro/ROMANIA/PRAHOVA/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/SALAJ/](https://orase.peviitor.ro/ROMANIA/SALAJ/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/SATUMARE/](https://orase.peviitor.ro/ROMANIA/SATUMARE/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/SIBIU/](https://orase.peviitor.ro/ROMANIA/SIBIU/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/SUCEAVA/](https://orase.peviitor.ro/ROMANIA/SUCEAVA/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/TELEORMAN/](https://orase.peviitor.ro/ROMANIA/TELEORMAN/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/TIMIS/](https://orase.peviitor.ro/ROMANIA/TIMIS/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/TULCEA/](https://orase.peviitor.ro/ROMANIA/TULCEA/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/VALCEA/](https://orase.peviitor.ro/ROMANIA/VALCEA/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/VASLUI/](https://orase.peviitor.ro/ROMANIA/VASLUI/) |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | [https://orase.peviitor.ro/ROMANIA/VRANCEA/](https://orase.peviitor.ro/ROMANIA/VRANCEA/) |

## 💻 Utilizare

### Exemplu de apel din JavaScript

```javascript
// Obține toate localitățile din România
fetch('https://orase.peviitor.ro/')
  .then(response => response.json())
  .then(data => console.log(data));

// Obține localitățile dintr-un judet specific (ex: CLUJ)
fetch('https://orase.peviitor.ro/ROMANIA/CLUJ/')
  .then(response => response.json())
  .then(data => console.log(data));
```

### Exemplu de apel din PHP

```php
// Obține localitățile din Brașov
$json = file_get_contents('https://orase.peviitor.ro/ROMANIA/BRASOV/');
$data = json_decode($json, true);
print_r($data);
```

### Exemplu de apel cu cURL

```bash
# Obține toate localitățile
curl https://orase.peviitor.ro/

# Obține localitățile dintr-un judet
curl https://orase.peviitor.ro/ROMANIA/iasi/
```

## 📋 Structura răspunsului

Răspunsul este în format JSON și conține:

```json
{
  "nume": "ROMÂNIA",
  "judet": [
    {
      "nume": "CLUJ",
      "municipiu": [...],
      "oras": [...],
      "comuna": [...]
    }
  ]
}
```

Fiecare localitate include:
- `nume` - Numele localității
- `tip` - Tipul (sat, oras, municipiu)
- `localitate` - Sub-localități (pentru municipii/orașe)
- `adresaCompleta` - Adresa completă în format românesc

## 🤝 Contribuții

Contribuțiile sunt binevenite! Vă rugăm să deschideți un issue sau un pull request.

## 📄 Licență

MIT
