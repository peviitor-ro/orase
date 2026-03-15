# API Localități din România

Un API public care oferă informații despre toate localitățile din România: comune, municipii, orașe și sate.

## 🌐 Endpoint-uri

### Accesare generală

| Metodă | URL | Descriere |
|--------|-----|-----------|
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/` | Toate localitățile din România |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/` | Lista completă cu toate judetele |

### Accesare pe judete

Fiecare judet poate fi accesat individual folosind următorul format:

```
https://orase.peviitor.ro/ROMANIA/{JUDET}/
```

| Metodă | Endpoint |
|--------|----------|
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/BUCURESTI/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/ALBA/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/ARAD/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/ARGES/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/BACAU/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/BIHOR/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/BISTRITA-NASAUD/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/BOTOSANI/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/BRAILA/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/BRASOV/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/BUZAU/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/CALARASI/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/CARAS-SEVERIN/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/CLUJ/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/CONSTANTA/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/COVASNA/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/DAMBOVITA/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/DOLJ/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/GALATI/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/GIURGIU/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/GORJ/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/HARGHITA/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/HUNEDOARA/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/IALOMITA/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/IASI/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/ILFOV/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/MARAMURES/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/MEHEDINTI/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/MURES/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/NEAMT/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/OLT/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/PRAHOVA/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/SALAJ/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/SATUMARE/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/SIBIU/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/SUCEAVA/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/TELEORMAN/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/TIMIS/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/TULCEA/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/VALCEA/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/VASLUI/` |
| <span style="background-color: #28a745; color: white; padding: 2px 8px; border-radius: 4px;">GET</span> | `https://orase.peviitor.ro/ROMANIA/VRANCEA/` |

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
