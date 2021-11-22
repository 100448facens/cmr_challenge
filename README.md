# Challenge Collective Minds

## Usage

**System server at:**

`core system: localhost:8081`

`subject layer: localhost: 8080`

**Each docker container run services at:**

- **nginx** - `:80`
- **mysql** - `:3306`
- **php** - `:9000`
- **redis** - `:6379`
- **mailhog** - `:8025`

To start docker containers:


**Docker container Core:**

```
~ cd core_system
~ docker-compose up -d --build
~ docker-compose run artisan migrate:refresh --seed
```

The file with the initial data migration is located at: `database\seeders\MockDataSeeder` 

**Docker container subject layer:**

```
~ cd subject_layer
~ docker-compose up -d --build
~ cd src/
```

### API documentation subject layer

To generate the documentation, run the below command at subject docker container:
```
~ docker-compose run artisan l5-swagger:generate
```


To get the API documentation based on OpenAPI access: `http://localhost:8080/api/documentation`

API's Controller stored at: `app\Http\Controllers\Api`

Models, Resources, RequestValidators are stored at: `app\Virtual`


### Postman Test

Core system tests `file: CoreSystem.postman_collection.json`

Subject Layer tests `file: SubjectLayer.postman_collection.json`