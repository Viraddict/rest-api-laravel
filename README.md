# rest-api-laravel

# Getting Started

### Step 1:
Install Docker / Docker-toolbox
https://docs.docker.com/docker-for-windows/install/



### Step 2: 
Clone repository. On Windows need to clone to home directory

    cd ~
    git clone https://github.com/laravel/laravel.git project.loc
    
Move into the laravel-app directory and exec:

    cd ~/project.loc
    
Use Docker's composer image to mount the directories

    docker run --rm -v $(pwd):/app composer install
    
### Step 3

Running the Containers

    docker-compose up -d 

Once the process is complete, use the following command to list all of the running containers:

    docker ps
    
    CONTAINER ID        IMAGE                  COMMAND                  CREATED             STATUS              PORTS                                      NAMES
        d95701893d2f        mysql:5.7.22           "docker-entrypoint.s…"   3 minutes ago       Up 3 minutes        0.0.0.0:3306->3306/tcp                     db
        909f396d7bea        digitalocean.com/php   "docker-php-entrypoi…"   17 hours ago        Up 17 hours         9000/tcp                                   app
        d8f30f9a5202        nginx:alpine           "nginx -g 'daemon of…"   17 hours ago        Up 17 hours         0.0.0.0:80->80/tcp, 0.0.0.0:443->443/tcp   webserver

Run the migrations: 
    
    docker-compose exec app php artisan migrate
    


# Usage (API Consumption)

    document = {
       id: "some-uuid-string",
       status: "draft|published",
       payload: Object,
       created_at: "YYYY-DD-MM HH:MM:SS",
       updated_at: "YYYY-DD-MM HH:MM:SS",
    }


### Endpoints

**GET [hostname]/api/v1/document**

Returns a list of all documents.

@document_id string

**GET [hostname]/api/v1/document/[document_id]**

Returns the record of document with [document_id]

**POST [hostname]/api/v1/document**

Creates a new document. Returns the new document record.

@document_id string

**PATCH [hostname]/api/v1/document/[document_id]**

Updates the document specified with [document_id], by passing the following attributes (only **payload**).


@document_id string

**POST [hostname]/api/v1/document/[document_id]/publish**

Publish document with [document_id]

