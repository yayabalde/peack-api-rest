## === HELP ==================================================
help: ## Show this help.
	@echo "Symfony - Peack Api"
	@echo "---------------------------"
	@echo "Usage: make [target]"
	@echo ""
	@echo "Targets:"
	@grep -E '(^[a-zA-Z0-9_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'
#---------------------------------------------#

install: ## install vendor, load fixtures
	composer install
	composer dump-env dev
	bin/console doctrine:database:drop --force --if-exists --no-interaction
	bin/console doctrine:database:create --if-not-exists --no-interaction
	bin/console doctrine:migrations:migrate --no-interaction
	bin/console doctrine:fixtures:load --no-interaction
	npm install
	npm run dev
.PHONY: install