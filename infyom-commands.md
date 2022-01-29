```
infyom
  infyom:api                  Create a full CRUD API for given model
  infyom:api_scaffold         Create a full CRUD API and Scaffold for given model
  infyom:migration            Create migration command
  infyom:model                Create model command
  infyom:publish              Publishes & init api routes, base controller, base test cases traits.
  infyom:repository           Create repository command
  infyom:rollback             Rollback a full CRUD API and Scaffold for given model
  infyom:scaffold             Create a full CRUD views for given model
 infyom.api
  infyom.api:controller       Create an api controller command
  infyom.api:requests         Create an api request command
  infyom.api:tests            Create tests command
 infyom.publish
  infyom.publish:layout       Publishes auth files
  infyom.publish:templates    Publishes api generator templates.
  infyom.publish:user         Publishes Users CRUD file
 infyom.scaffold
  infyom.scaffold:controller  Create controller command
  infyom.scaffold:requests    Create a full CRUD views for given model
  infyom.scaffold:views       Create views file command
```

> php artisan infyom:scaffold --help 

    Description:
        Create a full CRUD views for given model

    Usage:
        infyom:scaffold [options] [--] <model>

    Arguments:
        model                                      Singular Model name

Options:

```--fieldsFile=FIELDSFILE```                Fields input as json file

```--jsonFromGUI=JSONFROMGUI```              Direct Json string while using GUI interface

```--plural=PLURAL```                        Plural Model name

```--tableName=TABLENAME```                  Table Name

```--fromTable```                            Generate from existing table

```--ignoreFields=IGNOREFIELDS```            Ignore fields while generating from table

```--save```                                 Save model schema to file

```--primary=PRIMARY```                      Custom primary key

```--prefix=PREFIX```                        Prefix for all files

```--paginate=PAGINATE```                    Pagination for index.blade.php

```--skip=SKIP```                            Skip Specific Items to Generate (

- migration
- model
- controllers
- api_controller
- scaffold_controller
- repository
- requests
- api_requests
- scaffold_requests
- routes
- api_routes
- scaffold_routes
- views
- tests
- menu
- dump-autoload

)

```--datatables=DATATABLES```                Override datatables settings

```--views=VIEWS```                          Specify only the views you want generated: index,create,edit,show

```--relations```                            Specify if you want to pass relationships for fields

```--softDelete```                           Soft Delete Option

```--forceMigrate```                         Specify if you want to run migration or not

```--factory```                              To generate factory

```--seeder```                               To generate seeder

```--localized```                            Localize files.

```--repositoryPattern=REPOSITORYPATTERN```  Repository Pattern

```--connection=CONNECTION``` 


> Now you have to focus on your database, my model name is ProcessingSession (table name: processing_sessions) that has a one-to-many relationship with ProcessingFile (table name: processing_files). The command I used to set up the first CRUD is:

```
> php artisan infyom:scaffold --fromTable --tableName=processing_sessions --factory --seeder --skip=model ProcessingSession
```

Take a look at every option:
- ```--fromTable --tableName=processing_sessions``` these options are needed to get model data from the database. By using dbal, this will fetch the table structure from the database and use every detail about the table structure for the generation.
- ```--factory``` will generate a factory for the model.
- ```--seeder``` will generate a seeder for the model.
- ```--skip=model``` this is needed if you already have your own model implementation, if you don’t have any model in your project, this will generate a Model file for your table.

php artisan infyom:scaffold --fromTable --tableName=categories --skip=model Category
