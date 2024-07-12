
Builder

	Models:
		Settings:
			TableInfoSettings
			ModelInfoSettings
			FieldSettings
			FilesSettings

		Forms:
			TableInfoForm -> TableInfoSettings
			ModelInfoForm -> ModelInfoSettings
			FieldForm -> FieldSettings
			FilesForm -> FilesSettings

		Collections:
			CollectionTableInfo
				TableInfoForm tableInfoForm
				TableInfoForm[] listTableInfoForm


	CollectionTableInfo->listTableInfoSettings = CacheService->getAllTableInfoSettings();

  	if ( Request->isPost ) :

        1. Create Table Info

            TableInfoForm tableInfoForm
                string tableName
                string tableComment
                ModelInfoForm modelInfoForm

                FieldForm[] listfieldForm
                    string name
                    string comment
                    string type
                    string default
                    int length
                    bool notNull
                    bool unique
                    bool foreignKey
                FilesForm[] listFileForm
                    string template
                    bool required

            TableInfoForm[tableName]
            TableInfoForm[tableComment]
            TableInfoForm[modelInfoForm][singular]
            TableInfoForm[modelInfoForm][plural]
            TableInfoForm[listFieldForm][ {key} ][name]
            TableInfoForm[listFieldForm][ {key} ][comment]
            TableInfoForm[listFieldForm][ {key} ][type]
            TableInfoForm[listFieldForm][ {key} ][default]
            TableInfoForm[listFieldForm][ {key} ][length]
            TableInfoForm[listFieldForm][ {key} ][notNull]
            TableInfoForm[listFieldForm][ {key} ][unique]
            TableInfoForm[listFieldForm][ {key} ][foreignKey]
            TableInfoForm[listFileForm][ {path} ][requred]

            if ( CollectionTableInfo->newTableInfoForm->load($post) )
                CacheService->saveTableInfoSettings(CollectionTableInfo->newTableInfoForm);

        2. Update Table Info List

            CollectionTableInfo->load($post);

            TableInfoForm[] listTableInfoForm
                string tableName
                string tableComment
                ModelInfoForm modelInfoForm
                FieldForm[] listfieldForm
                    string name
                    string comment
                    string type
                    string default
                    int length
                    bool notNull
                    bool unique
                    bool foreignKey
                FilesForm[] listFileForm
                    string template
                    bool required

            CollectionTableInfo[listTableInfoForm][ {name} ][tableName]
            CollectionTableInfo[listTableInfoForm][ {name} ][tableComment]
            CollectionTableInfo[listTableInfoForm][ {name} ][modelInfoForm][singular]
            CollectionTableInfo[listTableInfoForm][ {name} ][modelInfoForm][plural]
            CollectionTableInfo[listTableInfoForm][ {name} ][listFieldForm][ {key} ][name]
            CollectionTableInfo[listTableInfoForm][ {name} ][listFieldForm][ {key} ][comment]
            CollectionTableInfo[listTableInfoForm][ {name} ][listFieldForm][ {key} ][type]
            CollectionTableInfo[listTableInfoForm][ {name} ][listFieldForm][ {key} ][default]
            CollectionTableInfo[listTableInfoForm][ {name} ][listFieldForm][ {key} ][length]
            CollectionTableInfo[listTableInfoForm][ {name} ][listFieldForm][ {key} ][notNull]
            CollectionTableInfo[listTableInfoForm][ {name} ][listFieldForm][ {key} ][unique]
            CollectionTableInfo[listTableInfoForm][ {name} ][listFieldForm][ {key} ][foreignKey]
            CollectionTableInfo[listTableInfoForm][ {name} ][listFileForm][ {path} ][requred]

            if ( CollectionTableInfo->load($post) )
                foreach( CollectionTableInfo->listTableInfoForm as tableInfoForm )
                    CacheService->saveTableInfoSettings(tableInfoForm);

        3. Generate Table Info

        4. Generate Table Info List

	CollectionTableInfo->listTableInfoSettings = CacheService->getAllTableInfoSettings();

	CollectionTableInfo->listTableInfoForm = CacheService->generateListTableInfo(CollectionTableInfo->listTableInfoSettings);

