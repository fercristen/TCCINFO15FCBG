
 The following SQL statements will be executed:

     DROP INDEX ativo_index ON gremio;
     CREATE INDEX ativo_index ON gremio (gre_mandato_atual);
     ALTER TABLE noticias ADD CONSTRAINT FK_253D92520EF25B5 FOREIGN KEY (tem_id) REFERENCES temas (tem_id);
     ALTER TABLE noticias_imagens ADD CONSTRAINT FK_42BAD60F64892549 FOREIGN KEY (imagem_id) REFERENCES imagens (img_id);
     ALTER TABLE noticias_imagens ADD CONSTRAINT FK_42BAD60F99926010 FOREIGN KEY (noticia_id) REFERENCES noticias (not_id);
