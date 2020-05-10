BIN = node_modules/.bin
NAME = woocommerce-product-badges

bootstrap:
	yarn install

build: clean lint
	mkdir dist
	mkdir dist/$(NAME)
	# 	$(BIN)/webpack -p --progress
	cp php/* dist/$(NAME)
	zip -r dist/$(NAME).zip dist/$(NAME)

watch:
	$(BIN)/webpack -p --progress --watch

lint:
	$(BIN)/standard "js/**/*.{js,jsx}" --verbose | $(BIN)/snazzy

clean:
	rm -rf ./dist
