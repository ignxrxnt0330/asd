package clases;

import java.awt.Dimension;

import javax.swing.JButton;

@SuppressWarnings("serial")
public class Boton extends JButton{
	private Dimension btn_size = new Dimension(200, 100);
	
	public Boton(String texto) {
		JButton boton = new JButton();
		boton.setSize(btn_size);
	}
	public Boton(String texto,int largo, int alto) {
		JButton boton = new JButton();
		boton.setSize(new Dimension(largo,alto));
	}

}