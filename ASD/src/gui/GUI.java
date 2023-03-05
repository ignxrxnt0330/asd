package gui;

import java.awt.BorderLayout;
import java.awt.GridLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.BorderFactory;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;

public class GUI implements ActionListener {

		private int clicks = 0;
		private JLabel label;
		private JFrame frame;
		
	public GUI() {
		frame = new JFrame();
		
		JButton button = new JButton("Click me");
		label = new JLabel("Nümero de clicks: 0");
		button.addActionListener(this);
		
		JPanel panel = new JPanel();
		
		panel.setBorder(BorderFactory.createEmptyBorder(300,300,100,300));
		panel.setLayout(new GridLayout(0,1));
		panel.add(button);
		panel.add(label);
		
		frame.add(panel,BorderLayout.CENTER);
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		frame.setTitle("asd");
		frame.pack();
		frame.setVisible(true);
	}
	
	public static void main(String[] args) {
		GUI GUI = new GUI();
	}

	@Override
	public void actionPerformed(ActionEvent e) {
		clicks++;
		label.setText("Número de clicks: "+clicks);
		;
		
	}

}
