## Desafio Tracklead

Laravel + mysql + livewire + Alpine.js

Para executar:

1. composer install
2. php artisan migrate
3. php artisan db:seed
4. php artisan serve

# API

Listagem de Stores:

GET `/api/stores`

response 200:

```json
[
    {
        "id": 1,
        "name": "et",
        "location": "odio similique omnis",
        "description": "vel excepturi dicta",
        "created_at": "2024-03-07T22:10:46.000000Z",
        "updated_at": "2024-03-07T22:10:46.000000Z"
    },
    {
        "id": 2,
        "name": "rerum",
        "location": "minima perspiciatis omnis",
        "description": "et corporis molestiae",
        "created_at": "2024-03-07T22:10:46.000000Z",
        "updated_at": "2024-03-07T22:10:46.000000Z"
    }
]
```

Exibição de Store com pixels:

GET `/api/stores/1`

response `200`:

```json
[
    {
        "id": 1,
        "name": "et",
        "location": "odio similique omnis",
        "description": "vel excepturi dicta",
        "created_at": "2024-03-07T22:10:46.000000Z",
        "updated_at": "2024-03-07T22:10:46.000000Z",
        "pixels": [
            {
                "id": 1,
                "store_id": 1,
                "platform": "Tiktok",
                "code": "ntRbZJPXNbIezNhOJu5ezaJxU",
                "created_at": "2024-03-07T22:10:46.000000Z",
                "updated_at": "2024-03-07T22:10:46.000000Z"
            },
            {
                "id": 2,
                "store_id": 1,
                "platform": "Tiktok",
                "code": "ItsKSKAUx4fDJGV47skyR1nYp",
                "created_at": "2024-03-07T22:10:46.000000Z",
                "updated_at": "2024-03-07T22:10:46.000000Z"
            }
        ]
    }
]
```

Caso não exista o registro:

response `404`:

```json
[]
```
