# Orase API - Testing Framework

Automated test suite for the Romanian localities API (`orase.peviitor.ro`).

## Running Tests

### Run all tests for ALBA county:
```
php testing/index.php
```

### Run specific test types:
```bash
php testing/index.php?type=structure   # Test file structure
php testing/index.php?type=adresa      # Test adresaCompleta
php testing/index.php?type=search      # Test search functionality
php testing/index.php?type=diacritics  # Test diacritics handling
php testing/index.php?type=case        # Test case sensitivity
php testing/index.php?type=all        # Run all tests
```

### Test other counties:
```bash
php testing/index.php?judet=CLUJ
php testing/index.php?judet=BUCURESTI
```

## Test Categories

### Structure Tests
- Verify county folder exists
- Check all required files (municipii.php, orase.php, comune.php, index.php)
- Validate data loads correctly

### Adresa Completa Tests
- All localities have adresaCompleta
- Contains "România"
- Contains county name
- Has both diacritics and non-diacritics versions

### Search Tests
- Exact match searches work
- Find all municipii
- Find all orașe
- Find all comune

### Diacritics Tests
- Search with Romanian diacritics (ă, â, ț, ș, î)
- Search without diacritics finds diacritic names
- Proper handling of special characters

### Case Sensitivity Tests
- Lowercase finds uppercase
- Mixed case finds uppercase
- Case-insensitive search works

## Adding New Test Data

Add test cases in `testing/data/{COUNTY}.php`:

```php
<?php
return [
    'name' => 'CLUJ',
    'municipii' => [
        [
            'name' => 'CLUJ-NAPOCA',
            'type' => 'municipiu',
            'adresaCompleta' => 'municipiul CLUJ-NAPOCA, judetul CLUJ, România',
            'villages' => [...]
        ]
    ],
    // ...
];
```

## Test Data Location

| Type | Location |
|------|----------|
| Test Framework | `testing/includes/` |
| Test Data | `testing/data/{COUNTY}.php` |
| Test Cases | `testing/test_data/{COUNTY}/` |
| Results | Console output |

## Exit Codes

- `0` - All tests passed
- `1` - One or more tests failed
