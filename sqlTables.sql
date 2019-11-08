
 The following SQL statements will be executed:

     ALTER TABLE gremio DROP gre_data_posse;
     ALTER TABLE noticias_imagens ADD CONSTRAINT FK_42BAD60F64892549 FOREIGN KEY (imagem_id) REFERENCES imagens (id);
     ALTER TABLE noticias_imagens ADD CONSTRAINT FK_42BAD60F99926010 FOREIGN KEY (noticia_id) REFERENCES noticias (id);
